<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\Section;
use App\Models\User;
use Illuminate\Routing\RouteCollection;
use Tests\TestCase;

class DashboardPagesSmokeTest extends TestCase
{
    protected $user;
    protected $section;

    protected function setUp(): void
    {
        parent::setUp();

        $this->prepareTestRoutes();

        $this->user = User::first();
        $this->section = Section::create([
            'title' => 'test-smoke-section',
            'is_active' => 1,
        ]);
    }

    protected function tearDown(): void
    {
        Page::where('section_id', $this->section->id)->forceDelete();
        $this->section->forceDelete();
        Section::where('title', 'test-smoke-created')->forceDelete();
        parent::tearDown();
    }

    /**
     * Make dashboard routes reachable in the test environment.
     *
     * In PHPUnit the kernel is bootstrapped by SetRequestForConsole with a
     * URL-less request, so mcamara registers the localized routes WITHOUT the
     * /fr prefix. The catch-all route ({any}, declared before the localized
     * group in routes/web.php) then swallows any unprefixed GET like
     * /dashboard/sections and bounces it back to itself. LocaleSessionRedirect
     * additionally redirects unprefixed URLs to /fr/... which 404s here.
     *
     * So we drop the catch-all and hide the default (fr) locale, which makes
     * the whole middleware chain pass unprefixed dashboard URLs straight
     * through to the real routes - mirroring what the browser does after the
     * locale redirect.
     */
    protected function prepareTestRoutes(): void
    {
        config(['laravellocalization.hideDefaultLocaleInURL' => true]);

        $router = app('router');
        $collection = new RouteCollection();
        foreach ($router->getRoutes() as $route) {
            if ($route->uri() !== '{any}') {
                $collection->add($route);
            }
        }
        $router->setRoutes($collection);
    }

    public function testSectionsIndexPageRenders(): void
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.sections.index'));

        $response->assertOk();
        $response->assertSee('Gestion des sections');
    }

    public function testPagesIndexPageRenders(): void
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.pages.index'));

        $response->assertOk();
        $response->assertSee('Gestion des pages');
    }

    public function testPagesCreatePageRenders(): void
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.pages.create'));

        $response->assertOk();
        $response->assertSee('Nouvelle page');
    }

    public function testPageCanBeStored(): void
    {
        $response = $this->actingAs($this->user)
            ->from(route('dashboard.pages.create'))
            ->post(route('dashboard.pages.store'), [
                'section_id' => $this->section->id,
                'type' => 'generic',
                'title' => 'Page de test fonctionnel',
                'subtitle' => 'sous-titre',
                'category' => 'analyses',
                'content' => '<p>contenu</p>',
                'is_active' => 1,
            ]);

        $response->assertRedirect(route('dashboard.pages.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pages', [
            'section_id' => $this->section->id,
            'title' => 'Page de test fonctionnel',
            'is_active' => '1',
        ]);
    }

    public function testPageStoreValidatesTitle(): void
    {
        $response = $this->actingAs($this->user)
            ->from(route('dashboard.pages.create'))
            ->post(route('dashboard.pages.store'), [
                'section_id' => $this->section->id,
                'type' => 'generic',
                'title' => '',
            ]);

        $response->assertRedirect(route('dashboard.pages.create'));
        $response->assertSessionHasErrors('title');
    }

    public function testSectionCanBeStored(): void
    {
        $response = $this->actingAs($this->user)
            ->from(route('dashboard.sections.index'))
            ->post(route('dashboard.sections.store'), [
                'title' => 'test-smoke-created',
                'is_active' => 1,
            ]);

        $response->assertRedirect(route('dashboard.sections.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('sections', ['title' => 'test-smoke-created']);
    }

    public function testSectionToggleReturnsJson(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('dashboard.sections.toggle', $this->section));

        $response->assertOk();
        $response->assertJson(['success' => true, 'active' => false]);
    }
}
