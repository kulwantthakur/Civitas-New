@extends('rdp.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center rdp-banner-header">
    <a href="{{ route('rdp.home') }}" class=" rdp-logo-outer white-background">
        <img src="{{ asset('img/logo/historique.svg') }}" class=" d-lg-block d-xl-block d-xxl-block" alt="logo" />        
    </a>
</div>
@endsection


@section('content')
<div class="first-sec">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('img/rdp/plus.png') }}" class="plus-img" alt="plus" />
        </div>
        <div class="col-10">
            <h2 class="black-bg-text m-plus plus-txt">

                Les conséquences historiques de la consécration des nations au Cœur Immaculé de Marie
            </h2>
        </div>
    </div>
</div>
<div class="rdp-page-cls historic">
    <div class="container">
        <h2 class="light-h2">
            <span>.</span> <br>
            Au Portugal, on conservera toujours le dogme de la foi <br> <span class="clr-chnge"> sœur Lucie</span>,
            <span><b>Mémoires de sœur Lucie, IV, n.5</b> </span><br>
            <span>.</span><br>
            <span>.</span>
        </h2>
        <p>Afonso Henriquès né le 25 juillet 1109 à Guimaraes, il appartient à la dynastie de Bourgogne de la lignée de la Maison capétienne de Bourgogne. C’est un descendent de Hugues Capet (987) issu de la branche robertienne et fondateur de la dynastie capétienne. Il est le fils de Henri de Bourgogne (1066), Comte de Portugal et petit fils de Alphonse VI, Roi de Castille.
        </p>
        <p>
            En 1139 eu lieu la bataille d’Ourique, dans la région de l'Alentejo au sud du Portugal. La Castille chassait alors les musulmans et faisait appelle à des croisés français qui se trouvaient sous les ordres de Alfonso Henriquès. C’est suite à la victoire de cette bataille qu’il fut acclamé par ses troupes : 1 er Roi de Portugal, marquant la transition du comté au royaume de Portugal.
        </p>
        <p>
            Avant la bataille une vision miraculeuse du Christ en croix apparut à Alfonso Henriquès et aurait galvanisé ses troupes alors qu’elles étaient en nette infériorité numérique face à l’armée musulmane.
        </p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img1.png') }}" class="" alt="" />
            <p>Les cinq écus bleus représentent les rois vaincus et, les points blancs à l'intérieur des écus symbolisent les cinq plaies du Christ, faisant référence à l'aide divine reçue lors de la bataille. Les sept châteaux d'or évoquent les conquêtes territoriales de Alfonso Henriquès. </p>

            <img src="{{ asset('img/rdp/img2.png') }}" class="" alt="" />
            <p>La vision d'Alphonse Henriques de Jésus Christ et de <span class="clr-chnge">l'Ange gardien du Portugal</span> pendant la bataille d'Ourique</p>
        </div>


        <p>Son grand-père, Alphonse VI protesta et Alfonso Henriquès dû faire appel à Rome et le Portugal se déclara <b>indépendant sous la souveraineté du Pape</b> Alexandre III qui reconnut officiellement ce royaume par la bulle <span class="font-SuisseScreenItalic">Manifestis Probatum.</span> Il nomma le Portugal : <span class="font-SuisseScreenItalic">La Nation très fidèle.</span>
        </p>
        <p>
            Le nouveau souverain avait une très grande dévotion pour la Mère de Dieu, la Vierge Marie, qu’il choisit comme la patronne du royaume. Le Portugal fut <b>consacré à l’Immaculé dès sa fondation</b> et vêtu du manteau de la Sainte église comme le fut d’une certaine manière quelques années plus tard Saint François d’Assise....
            Il choisit Saint Michel Archange comme protecteur de ses armées.
        </p>
        <p>Un autre fait historique fut la conversion d’une princesse musulmane lors de cette reconquête par les croisés. L’un des chevaliers templiers, Gonçalo Henriques, souhaitait épousé une princesse nommé Fatima. Il demanda l’autorisation au roi qui accepta si cette dernière voulu se convertir. Elle fut baptisé et pris le nom de Oureana, la localité de Fatima pris le nom d’Ourém au XVI siècle.... </p>
        <p>L’un des descendants de Alfonso Hendriquès, Denis 1 er ( 1261-1325 ), sixième roi de Portugal ; cousin de Saint Louis, Louis IX, fut entre autre le fondateur de l’Ordre du Christ et de l’Université de Coïmbra. Il épousa élisabeth d’Aragon devenu <b>Sainte élisabeth de Portugal.</b> Fille de Pierre III d’Aragon, roi d’Aragon et de Sicile. ; nièce de Sainte élisabeth de Hongrie. Au moment où il accueillait sa jeune reine, le Portugal venait de rejeter définitivement les Sarrasins hors de son territoire et de conquérir ses limites actuelles ; il entrait dans une ère de paix et de prospérité. La part d’Elisabeth dans cette œuvre de restauration fut considérable, en particulier dans la construction et l’aménagement des églises, des hôpitaux et des orphelinats ; et si le peuple reconnaissant décerna à son roi les titres de « Roi laboureur » et de « Père de la Patrie », il salua sa reine du vocable de « Patronne des laboureurs ». La reine élisabeth de Portugal avait une très grande dévotion pour l’Immaculé et fut un exemple de sainteté après une vie toute d’œuvres héroïques, elle mourut en saluant la Très Sainte Vierge, qui lui apparut, accompagnée de sainte Claire et de quelques autres Saintes. Peut avant sa mort, elle fit le pèlerinage de Coïmbra à Saint Jacques de Compostelle oû <b>elle déposa sa couronne à la Vierge Marie.</b> Ce geste sera repris plus tard par Jean IV .... </p>

        <div class="img-sec pt-3">
            <img src="{{ asset('img/rdp/img3.png') }}" class="" alt="" />
            <p> Sainte élisabeth de Portugal ; 4 janvier 1271 - 4 juillet 1336</p>


        </div>
        <div class="video-sec">
            <img src="{{ asset('img/rdp/VIDEO.png') }}" class="" alt="" />
        </div>
        <p>
            Plus tard, lors de la conquête de l’indépendance du Portugal sur la Castille
            espagnole, son souverain, Jean d’Avis, invoqua solennellement la protection de
            Marie sur le plateau même de Fatima. <b>C’était le 13 août 1385. Pour la première
                fois, le treizième jour du mois voyait Notre-Dame honorée publiquement en ce
                lieu. </b> victoire éclatante s’ensuivit le lendemain. En reconnaissance, le roi fit
            édifier le monastère de Bathala qu’il avait promis à la Madone s’il gagnait la
            bataille. Il le confia aux dominicains et, de là, la dévotion au saint rosaire se répandit dans toute la contrée. <b>Ce fut aussi un 13 mai qu’à la demande du même roi, le pape Boniface IX (1355-1404) accorda que toutes les cathédrales du pays
                soient consacrées à la sainte Vierge.<sup> 1 </sup></b>
        </p>
        <p>Le Portugal devint le plus grand empire colonial du monde, cette conquête apostolique mené en partie par Henri le navigateur, maître de l’Ordre du Christ, fut confié à la Vierge Marie. <b>Ce qui permis d’étendre le règne de Notre Seigneur Jésus -Christ</b> en Afrique, en Asie (Inde 1498) et en Amérique du sud (Brésil 1500). </p>
        <p>Le 20 octobre 1646 Jean IV renouvelait le geste de Alfonso Hendriquès, proclamant la Vierge de la Conception patronne de son royaume. Il s’obligeait aussi par serment à professer et défendre, même au prix de sa vie la doctrine de l’Immaculé Conception. Ce fut aussi le dernier portugais couronné. Lors de son couronnement <b>il posa sa couronne sur la tête d’une statue de la Vierge Marie</b> et la déclara : <span class="font-SuisseScreenItalic">“ Véritable reine du Portugal “.</span>
            <br>Aucun roi après lui ne porta une couronne. Ces dernières furent posée à coté du souverain lors de l’acclamation.
        </p>
        <p><b>Dès lors il est facile de comprend pourquoi la Vierge Marie
                choisi ce pays en 1917, pour venir demander la dévotion à son Cœur
                Immaculé : elle venait chez elle.</b></p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img4.png') }}" class="" alt="" />
            <p> Le roi Manuel II (15 novembre 1889 - 12 juillet 1932) ; sa couronne sur la table est le dernier roi de Portugal. Il règne de 1908 à 1910.</p>
        </div>
        <p><b>Le XVIII e siècle, qui vit l’avènement des « Lumières » en France, vit commencer la décadence du Portugal catholique.</b></p>
        <p>A partir de 1870, une partie des francs-maçons, après avoir forcé le roi Jean VI à accepter une monarchie constitutionnelle, commença à préparer l’avènement de la république.
            Le 1 er février 1908, le roi Charles I er qui avait tenté de reprendre les choses en
            main, était assassiné avec le prince héritier, sur ordre de la franc-maçonnerie
            portugaise et de la secte des carbonaristes (condamné par le Pape Pie VII dans son encyclique Ecclesiam a Jesu Christo ).
            Manuel II, son second fils, trop faible, ne put tenir longtemps. Il fut
            renversé, et la république proclamée le 5 octobre 1910.</p>
        <h2 class="light-h2 small">
            <span>.</span> <br>
            “ Notre révolution est internationale. Nous commencerons simultanément dans la Péninsule Ibérique et en Russie, et un jour la révolution s’étendra à travers toute l’Europe.” .<br> <span class="clr-chnge"> Lénine à Trotsky</span>,
            à Paris.<br>
            <span>.</span><br>
            <span>.</span>
        </h2>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img5.png') }}" class="" alt="" />
            <p> Des révolutionnaires défilent avec le drapeau de la société secrète des carbonaristes sur la La Place du Marquis de Pombal à Lisbonne le 5 octobre 1910.</p>
        </div>
        <p>“Le plan de ces révolutionnaires, dont le but était de détruire la foi catholique dans les âmes et aussi toute la chrétienté européenne, consistait à prendre le Vieux Continent en tenaille, en fomentant des révolutions simultanées pour s’emparer des gouvernements en même temps dans trois pays : les deux pays les plus à l’ouest de l’Europe (Espagne et Portugal) et le grand pays de l’est de l’Europe, la Russie. Ce plan ressort clairement des propos de Lénine à Trotsky, à Paris, dans les premiers jours de la conspiration marxiste : « Notre révolution est internationale. Nous commencerons simultanément dans la Péninsule Ibérique et en Russie, et un jour la révolution s’étendra à travers toute l’Europe ».<sup> 2 </sup></p>
        <p><b>En 1910 en Russie, la situation n’était pas encore propice aux révolutionnaire, qui durent attendre 1917. Date à laquelle la Vierge Marie apparut à Fatima ... </b>
            A cette époque on discernait nettement le “sans Dieu” bolchéviste, communistes et autres mouvements anti-chrétiens, dont le programme est de ne pas croire, ni adorer, ni espérer, ni aimer. </p>
        <p>“Remarquez d’ailleurs les coïncidences, dit le R.P. Fonseca : le 16 avril 1917 arrivaient à Petrograd Lénine et Trotzkij et les jours suivants, ils donnaient une orientation à la révolution socialo-communiste et en prenaient le commandement. le 7 novembre de la même année, triomphait à Petrograd, puis à Moscou, la faction bolchéviste qui, dans sa lutte contre Dieu, ambitionnait de massacrer la Russie, le Mexique, la Péninsule Ibérique, puis le monde entier.
            C’est entre ces deux dates, exactement 25 ou 27 jours après la première et autant avant la seconde, qu’eurent lieu la première et la dernière apparition de Fatima. “ <sup>3</sup> </p>
        <p>L’effet des apparitions qui
            bouleversèrent le pays, en particulier le grand miracle du soleil du 13 octobre 1917, devant une foule de 70 000 à 100 000 personnes , Les guérisons miraculeuses, les conversions, le pèlerinage spontané, <b>permirent le relèvement soudain du Portugal face à la révolution. </b>Effectivement les révolutionnaires, avaient conduit le Portugal dans un véritable cahot financier, moral et politique. La dette flottante de ce pays s’élevait à deux milliards d’escudos. Il n’avait plus de crédit et la Société des Nations menaçait de placer ses finances sous contrôle étranger et politiquement c’était l’anarchie.
            Il fallut bien sûr un certain temps, et plusieurs étapes, pour que les conséquences s’en
            fassent sentir de manière stable au niveau politique.</p>

        <div class="img-sec">
            <img src="{{ asset('img/rdp/img6.png') }}" class="" alt="" />
            <p> le grand miracle du soleil le 13 octobre 1917</p>
        </div>
        <p>Les apparitions de Fatima se produisirent au moment où l’anarchie atteignait, au Portugal, un degré sans précédent. Le pouvoir appartenait à la bombe
            et au pistolet.
            Sidonio Bernardino Cardoso da Silva Pais, professeur à Coïmbra, commandant dans l’armée, républicain convaincu, franc-maçon avoué, ministre d’État,
            réussit à grouper autour de lui un grand nombre de ceux qui, dans le monde
            politique et militaire, voulaient en finir avec le terrorisme et aspiraient à un ré-gime plus modéré. Il prit le pouvoir le 8 décembre 1917, première fête de l’Immaculée Conception qui suivit les événements de la Cova da Iria. Après tant
            d’excès, il voulait pacifier le pays, et pour cela arrêter les persécutions contre
            l’Église. Les mesures sectaires disparurent peu à peu. L’acte le plus spectaculaire de cette nouvelle orientation fut le rétablissement des relations diplomatiques avec le Saint-Siège en juillet 1918.
            Franc-maçon en public, il ne cachait pas à ses intimes ses désirs de conversion. L’historien Costa Brochado note : « Un officier de sa police, son dévoué
            lieutenant Faria, nous raconta un jour que Sidonio Pais se considérait comme
            protégé par la sainte Vierge, et que, à la fin de sa vie, il avait eu des “visions encourageantes” qui lui donnaient une force morale irrésistible. » Mais les Loges
            le firent assassiner le 14 décembre 1918, en gare de Lisbonne. On plaça un crucifix sur sa poitrine déchirée par les balles.<sup>4</sup></p>
        <div class="img-sec pt-3">
            <img src="{{ asset('img/rdp/img7.png') }}" class="" alt="" />
            <p> Sidonio Bernardino Cardoso da Silva Pais,</p>
        </div>
        <p><b>Salazar, le miracle de Notre Dame de Fatima</b></p>
        <p>Le 28 mai 1926, ce fut de Braga, la capitale du bastion catholique du Nord,
            que partit le soulèvement militaire libérateur, alors qu’un congrès marial présidé par le nonce exaltait les heureuses conséquences des apparitions de Fatima
            pour le pays :
            Juste au moment où, processionnellement, sortait la statue de la Vierge de
            l’église du Populo pour se rendre au Sameiro, sortaient aussi de leur caserne,
            contiguë à l’église, sous la bénédiction, dirait-on, de Marie, les troupes du 8e régiment d’infanterie préludant à la révolution 1. En trois jours, elle gagna le pays
            tout entier et triompha, sans qu’ait été tiré un seul coup de fusil, ni versée une
            seule goutte de sang : cas unique dans toute l’histoire du Portugal .
            En 1928, le général Carmona, ayant assumé tout seul le pouvoir, fit appel
            pour le ministère des Finances, à António de Oliveira Salazar , professeur de
            droit à l’université de Coïmbra. Salazar demanda conseil à son ami l’abbé
            Manuel Gonçalves Cerejeira , et au père Mateo Crawley, l’ardent apôtre du
            Sacré-Cœur, alors de passage au Portugal. Puis il passa plusieurs heures en
            prière dans la nuit devant le tabernacle, et enfin, après avoir servi la messe matinale du père Mateo, il accepta.</p>

        <div class="history-sec">
            <div class="history-img">
                <img src="{{ asset('img/rdp/img8.png') }}" class="" alt="" />
                <p> Mateo Crawley-Boevey (1875-1960) ,<br> l’Apotre du Sacré-Cœur </p>
            </div>
            <div class="history-img">
                <img src="{{ asset('img/rdp/img9.png') }}" class="" alt="" />
                <p> António de Oliveira Salazar (1889 - 1970)</p>
            </div>
        </div>
        <p>Le nouveau ministre s’appliqua d’abord à relever les finances et l’économie,
            ce qu’il réussit à faire en deux ans seulement.
            <br>
            C’est dans ce contexte qu’intervint un événement décisif pour le pays : <b>la
                consécration du Portugal au Cœur Immaculé de Marie par le cardinal Cerejeira
                et tout l’épiscopat, le 13 mai 1931.</b> Le père Alonso affirme que sœur Lucie en
            fut l’inspiratrice . <b>En tous cas, cet acte, qui correspondait tellement aux désirs
                du Cœur de Marie, fut l’occasion pour Notre-Dame de faire tomber sur le
                Portugal une pluie de grâces.</b>
            <br>
            Le Portugal, qui était le pays d’Europe le plus troublé, va désormais en devenir le plus stable : le général Carmona demeurera président de la République
            jusqu’à sa mort en 1951, et Salazar dirigera le gouvernement jusqu’en 1968. Le
            pays traversera la révolution communiste espagnole et la Seconde Guerre mondiale, en restant en paix ainsi que toutes ses colonies.<sup>5</sup>
        </p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img10.png') }}" class="" alt="" />
            <p> antonio oliveira salazar avec sœur Lucie</p>
        </div>
        <div class="video-sec">
            <img src="{{ asset('img/rdp/VIDEO.png') }}" class="" alt="" />
        </div>
        <p>Lénine avait essayé de prendre l’Europe en tenailles entre la Russie et la péninsule ibérique. Les apparitions de Fatima firent échouer la moitié du plan.
            <br>
            Pour briser la deuxième pince de la tenaille avant qu’elle n’ait répandu ses erreurs dans le monde entier, il aurait fallu que le pape consacre la Russie au
            Cœur Immaculé de Marie, en union avec les évêques du monde entier. Cela se
            fera un jour, le Ciel l’a promis 2. En attendant, ce qui s’est passé au Portugal est
            l’image de ce qui arrivera en Russie lorsque le successeur de saint Pierre obéira
            à la sainte Vierge.
            <b>Pour récompenser les évêques portugais d’avoir consacré leur pays au Cœur
                Immaculé de Marie le 13 mai 1931, Notre-Dame accorda en effet au Portugal les
                trois grâces qu’elle avait promises pour la consécration de la seule Russie:</b>
        </p>
        <p>Un miracle de conversion se manifestant par une admirable restauration
            de l’Église, et correspondant à la promesse de la sainte Vierge : « Beaucoup
            d’âmes seront sauvées ».</p>
        <p>Un miracle de rénovation politique et sociale qui laisse entrevoir ce que
            sera la « conversion de la Russie » promise par Notre-Dame. Notons bien que la
            Vierge Marie n’a pas dit « conversion des Russes » ; en employant le mot de
            « Russie », elle a désigné le pays en tant qu’entité politique : il y aura donc, non
            seulement une conversion de la majorité de la population – préalable à tout redressement comme nous l’avons vu , mais aussi une régénération de toutes les
            institutions de la Russie qui deviendra un authentique pays de chrétienté.
        </p>
        <p>Enfin un miracle de paix : le Portugal fut préservé de la révolution communiste espagnole et de la Seconde Guerre mondiale. Un beau symbole en a été
            la construction de la basilique de Fatima en pleine guerre, alors que dans tant
            de pays du monde, les églises étaient détruites par centaines sous les bombardements. Ce miracle est l’écho de la promesse du 13 juillet 1917 : « Il sera donné
            au monde un certain temps de paix ». Bien sûr, il ne s’agit pas ici de n’importe
            quelle paix, mais de la paix du Christ par le règne du Christ.<sup>6</sup></p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img11.png') }}" class="" alt="" />
            <p> Sanctuaire de N.D. de Bourguillon, Fribourg</p>
        </div>
        <p>En Suisse c’est du coté du canton et de la ville de Fribourg que nous pouvons constater les fruits d’une pareil consécration. </p>
        <p>Les révolutionnaires, franc-maçons et autres société secrète agissaient déjà en Suisse depuis 1792 afin de renverser l’ordre de l’ancien régime qui subsistait malgré le passage de la réforme. ( Nous ne pourrons relater ici toute cette histoire à travers nos différents cantons. Ceci dit nous vous invitons à visionner la vidéo ci-dessous, dans laquelle nous trouvons un résumé de ce processus. )
            <br>
            Un prêtre, le chanoine Joseph Schorderet (1840-1893) lutta contre les Catholiques libéraux et le régime radical qui avait pris le pouvoir de Fribourg. Il fonda de multiple Association Catholique, Cercle, organisa des pèlerinages, fonda le journal la Liberté, la maison d’édition Saint-Paul ou encore co-fonda l’Université de Fribourg. Tout cela dans l’optique de faire régner le Christ sur la société, autrement dit Le règne du Christ roi. Il fit ce travaille à l’aide entre autre d’une femme connu sous le nom de Marguerite Bays (1815-1879). Cette dernière fut stigmatisée et avait la même dévotion pour le règne du Sacré-Cœur de Jésus.
        </p>
        <div class="liberte-sec">
            <img src="{{ asset('img/rdp/img12.png') }}" class="" alt="" />
            <img src="{{ asset('img/rdp/img13.png') }}" class="" alt="" />
        </div>
        <p>En 1852 c’est la chute du régime des Radicaux à Fribourg.
            <br>
            En 1886 avec le soutien du Chanoine Schorderet, George Python accède au pouvoir, c’est la naissance de la République Chrétienne.
            <br>
            En 1889, le 30 juin, la Ville et République de Fribourg est consacré au Sacré-Cœur de Jésus avec toutes ses autorités religieuse et civil par Mgr Mermillod, qui deviendra le Cardinal Mermillod.
        </p>
        <p>En 1920 le Diocèse de Lausanne, Genève et Fribourg reçoit l’évêque Mgr Besson, qui fut un protégé de Saint Jean Bosco. Mgr Besson avait une grande dévotion pour Notre Dame de Fatima.<br>
            A l’occasion d’une séance solennelle M.Quartenoud, conseiller d’Etat, prononça au Grand Conseil de Fribourg cette allocution suivante rapporté par Mgr Charrière :</p>
        <p><b> “ Au début de la guerre, lorsque la grande menace pesait sur le pays, nous l’avons vu monter avec son peuple, prier à Bourguillon (Chapelle de Notre Dame de Bourguillon Gardienne de la Foi). En présence des autorités civiles, des chefs de l’armée et de la population, il consacrait récemment le pays de Fribourg au Cœur Immaculé de Marie. “ </b></p>
        <p>Il semble que la consécration au Sacré-Cœur de Jésus devait donner les grâces pour que la consécration du Cœur-Immaculé puisse se faire. Sachant que nous sommes 10 ans avant la consécration au Sacré-Cœur du genre humain de Léon XIII. </p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img14.png') }}" class="" alt="" />
            <p> Mgr Besson à table avec le Général Guisan</p>
        </div>
        <p>Monseigneur François Charrière, évêque du diocèse de Lausanne-Genève-Fribourg, successeur de Mgr Besson approuva les statuts de la Fraternité Sacerdotale Saint Pie X et l’érigea en pia unio dans son diocèse, le 1er novembre 1970, comme le commente ici Mgr Lefebvre :</p>
        <p>“ Il avait donc eu quatre mois pour examiner ces constitutions, et j’avoue que je me rendais à l’évêché avec quelque appréhension. Le temps était déjà bien défavorable à toute œuvre de la Tradition, c’est pourquoi je me demandais bien ce qu’allait me répondre Son Excellence Mgr Charrière. Or, à ma stupéfaction et à ma joie, évidemment, il me dit : « Mais c’est entendu, je vais signer cela immédiatement ». Il fit appeler son secrétaire, lui demanda les documents ; la lettre était prête et Monseigneur signa devant moi l’acceptation de nos statuts et de nos constitutions.”<sup>7</sup></p>
        <p>Le tout premier séminaire de la Fraternité Sacerdotale Saint-Pie X a débuté le 13 octobre 1969 à Fribourg. Le dimanche suivant, Mgr Marcel Lefebvre et sa petite dizaine de séminaristes partaient en pèlerinage à Notre-Dame de Bourguillon, sur les hauteurs de la ville. Quelques mois plus tard, c’est dans le même sanctuaire, là ou Mgr Besson consacra le canton au Cœur Immaculé de Marie... qu’ont eu lieu les premières ordinations dans la Fraternité ! Si l’on songe au troisième secret de Fatima ....</p>
        <h2 class="light-h2 small">
            <span>.</span> <br>
            Chers amis, n’oublions pas ces circonstances, la sainte Providence ne fait rien par hasard.. <br> <span class="clr-chnge"> Mgr Marcel Lefebvre</span>,
            <span>Ecône, Toussaint – 1er novembre 1990 </span><br>
            <span>.</span><br>
            <span>.</span>
        </h2>
        <p>“ Les Etats qui professent désormais cet athéisme officiel, basé sur la Déclaration des droits de l’homme, sont dans un état de péché mortel continuel. Ils légalisent le péché. Puisqu’ils ont rejeté la Loi divine, ils font maintenant des lois qui sont contraires à la Loi divine et qui mettent des millions d’âmes en état de péché permanent : la loi du divorce met en état de péché mortel permanent les gens qui y recourent, l’avortement met en état de péché mortel tous ceux qui concourent à l’avortement, et ainsi de suite… Nous pourrions continuer la liste des lois qui mettent en état de péché habituel des millions d’âmes, et cela dans le monde entier, partout dans le monde chrétien. Par conséquent, nous pouvons dire en vérité que ces foules se dirigent vers l’enfer. A moins qu’elles ne retrouvent la grâce avant de mourir, espérons-le, elles vont en enfer. <b>C’est bien ce que montrait Notre-Dame de Fatima aux enfants : ces foules qui descendent en enfer ! Et cela est voulu, </b> organisé par toute une révolution, une révolution qui a commencé en particulier dans les universités, parmi les esprits soi-disant éclairés qui ont remplacé la pensée de Dieu et même l’être de Dieu par leur pensée personnelle, qui ont remplacé la Loi divine par leur propre conscience. C’est le péché radical : exclure Dieu de l’esprit, des volontés et des âmes. “<sup>8</sup></p>
        <div class="img-sec">
            <img src="{{ asset('img/rdp/img15.png') }}" class="" alt="" />
            <p> Mgr Lefebvre à Ecône entouré de ses séminaristes</p>
        </div>
        <h2 class="light-h2 small">
            <span>.</span> <br>
            D’une manière intime, j’ai parlé à Notre-Seigneur de ce sujet et, il y a peu de temps, je lui demandais pourquoi il ne convertirait pas la Russie sans que Sa Sainteté fasse cette consécration : « Parce que [dit Notre-Seigneur] je veux que toute mon Eglise reconnaisse cette consécration comme un triomphe du Cœur Immaculé de Marie, afin d’étendre ensuite son culte et placer, à côté de la dévotion à mon Divin Cœur, la dévotion à ce Cœur Immaculé 
            <br> <span class="clr-chnge"> Sœur Lucie</span>,
            <span>au printemps 1936, et révélé au Père Gonçalves, son confesseur, dans une lettre du 18 mai 1936 </span><br>
            <span>.</span><br>
            <span>.</span>
        </h2>
        <div class="video-sec">
            <img src="{{ asset('img/rdp/VIDEO.png') }}" class="" alt="" />
        </div>

        <div class="footnotes">
            <hr>
            <p><sup>1</sup> revue Sel de la terre n.53 p.309-310</p>
            <p><sup>2</sup> M. John Haffert, page 42 « Encontro de testemunhas », Edition portugaise de l’Armée Bleue, Fatima.</p>
            <p><sup>3</sup> Le prodige inouï de Fatima ; J.c.Castelbranco</p>
            <p><sup>4</sup> revue sel de la terre n.53 p. 317</p>
            <p><sup>5</sup> revue sel de la terre n.53 p. 318</p>
            <p><sup>6</sup> revue sel de la terre n.53 p. 330</p>
            <p><sup>7</sup> Mgr Marcel Lefebvre, Ecône, Toussaint – 1er novembre 1990 ;
                <a href="https://fsspx.ch/fr/la-parole-notre-fondateur/fsspx-32629" target="_blank">
                    https://fsspx.ch/fr/la-parole-notre-fondateur/fsspx-32629
                </a>
            </p>
            <p><sup>8</sup> Ibid.</p>
        </div>
    </div>
</div>


@endsection

