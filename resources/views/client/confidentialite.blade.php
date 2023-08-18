@extends('layouts.client_layout')
@section('contenu')
<!-- Banner start -->
<?php $nav = "confidentialite" ?>
@if (session('status'))
<div align='center' class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<section class="swiper-banner">
    <div class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="text-align:center">
                    <div style="padding-bottom:80px" class="swiper-content" data-animation="animated fadeInRight">
                        <br><br><br><br>
                        <h1>Gestion des Conventions de l'UVCI</h1>
                        <a href="{{route('client.partenariat')}}" class="btn-blue btn-red">DEVENEZ PARTENAIRE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Ends -->

<!-- Destinations -->
<section class="destinations" style="" ;>
    <div class="container">
        <h3>Conditions Générales d’Utilisation (UVCI)</h3>
        <div class="row">
            <div class="col-md-12">


                <h3>Préambule</h3>
                Les présentes Conditions générales d’utilisation décrivent les termes et conditions dans lesquels
                l’Université Virtuelle de Côte d’Ivoire (ci-après « UVCI ») fournit un service de création et
                d’hébergement de contenu sur son site Internet .uvci.edu.ci, (ci-après désigné par « site »). Tels
                qu’utilisés dans les présentes "Conditions générales d'Utilisation" et les suivantes « Politique de
                confidentialité » et « Charte d’utilisateurs », « nous » et « notre » se réfèrent à l’UVCI et au site
                UVCI.

                L’accès au site UVCI est subordonné au respect des présentes Conditions générales d’utilisation. Tout
                internaute souhaitant y accéder doit avoir pris connaissance préalablement de ces Conditions générales
                d’utilisation, de la charte utilisateurs, de la politique de confidentialité et des mentions légales, et
                s’engage à les respecter sans réserve.

                <h3>Objet</h3>
                L’UVCI fournit une plateforme en ligne d’hébergement de (Massive Open Online Courses, en français «
                cours en ligne ouverts et massifs) créés par des établissements d’enseignement supérieur, les organismes
                de recherche et les partenaires de l’UVCI en Côte d’Ivoire et dans le monde entier. En vous inscrivant à
                un cours en ligne sur le site, vous rejoignez une large communauté d'apprenants. L'ambition de l’UVCI
                est de fournir un accès aux meilleures formations de l’enseignement supérieur et de ses partenaires, et
                ce, quelle que soit votre localisation géographique. En vous inscrivant sur le site UVCI, vous acceptez,
                sans restriction ni réserve, les conditions générales d’utilisation, la charte utilisateurs et la
                politique de confidentialité. Tout accès et/ou utilisation du site UVCI est subordonné au respect de
                l’ensemble des termes des conditions générales d’utilisation, de la charte d'utilisateurs et de la
                politique de confidentialité sans restriction ni réserve.

                Si vous ne comprenez pas ces termes ou que vous ne souhaitez pas y être liés légalement, nous vous
                invitons à ne pas utiliser le site de l’UVCI, .uvci.edu.ci.

                L’UVCI se réserve donc le droit de refuser l'accès ou d’exclure, sans préjudice de tout dommage et
                intérêt pour l’utilisateur et sans notification préalable, tout utilisateur qui ne respecterait pas les
                conditions générales d'utilisation, la charte utilisateurs et la politique de confidentialité, et
                également de supprimer toute contribution ou commentaire notamment en cas d’infraction au regard de la
                loi ivoirienne, de même qu’en cas de réclamation d’un tiers.

                L’UVCI se réserve le droit de modifier à tout moment et sans communication préalable les conditions
                générales d'utilisation, la charte utilisateurs, la politique de confidentialité et les mentions
                légales, tout en préservant le respect des dispositions de la loi n° 78-17 du 6 janvier 1978 relative à
                l'informatique, aux fichiers et aux libertés. Tout changement sera immédiatement répercuté sur la
                présente page. La date de mise à jour sera mentionnée. Vous êtes donc invité à consulter régulièrement
                leur dernière version mise à jour. L'utilisation du site UVCI est soumise à un accord explicite.

                <h3>Règles de conduites de l’utilisateur</h3>
                En tant qu’utilisateur du site UVCI, vous êtes responsable de vos publications et de l’utilisation que
                vous faites du site. Les publications incluent l’ensemble des éléments de contenu soumis, publiés ou
                diffusés sur le site UVCI par vous ou d’autres utilisateurs. Par éléments de contenu, on entend les
                textes, les photos, les vidéos, les discussions dans le cadre des espaces d’interaction (forum, wiki,
                réseaux sociaux), les travaux soumis lors des devoirs (évaluation par les pairs notamment). De manière
                générale, l’UVCI vous rappelle qu’elle ne garantit pas la véracité, la complétude, l’exhaustivité, ni
                l’exactitude des commentaires diffusés via le site UVCI par d’autres utilisateurs. Vous reconnaissez que
                vous utiliserez le site UVCI en conformité avec les présentes conditions générales d'utilisation, la
                charte utilisateurs et la politique de confidentialité.

                L’UVCI rappelle qu’il est strictement interdit de procéder à tout acte de cybercriminalité à savoir :
                les infractions contre la confidentialité, l'intégrité et la disponibilité de l’accès, des
                contenus/données et systèmes informatiques du site UVCI, sans que cette liste ne soit exhaustive.

                Vous vous engagez ainsi à respecter les règles de déontologie informatique et notamment à ne pas
                effectuer intentionnellement ou non des opérations qui pourraient avoir pour conséquence de :
                • Usurper l’identité d’autrui ;
                • S’approprier le mot de passe d’un autre utilisateur ;
                • Modifier ou détruire des informations ne vous appartenant pas ;
                • Accéder à des informations appartenant à d’autres utilisateurs sans leur autorisation ;
                • Vous connecter ou tenter de vous connecter sur un compte sans autorisation ;
                • Laisser quelqu’un utiliser votre nom d’utilisateur et/ou votre mot de passe ;
                • Détourner l’une des fonctionnalités du site UVCI de son usage normal ;
                • D’endommager, mettre hors service, surcharger ou détériorer le serveur ou le réseau.
                Cette liste pourrait être complétée en fonction des dispositions légales et réglementaires actuelles.
                Vous vous engagez, par ailleurs, à ne pas essayer d’avoir un accès non autorisé au site UVCI, à ne pas
                recueillir sans autorisation des informations stockées sur le site UVCI, ses serveurs ou des ordinateurs
                associés par n'importe quels moyens non intentionnellement rendus disponibles par le site UVCI.
                En outre, vous vous engagez à respecter les dispositions légales et réglementaires en vigueur. Il est
                par conséquent formellement interdit de tenir :
                • des propos à caractère raciste, xénophobe, antisémite, homophobe, négationniste, pornographique,
                pédophile, pédopornographique… ;
                • des propos injurieux, diffamatoires, ou portant atteinte à la vie privée, et plus généralement aux
                droits de la personnalité de quiconque ;
                • des propos portant atteinte à la dignité humaine ;
                • des propos incitant à la violence, au suicide, au terrorisme, à l’utilisation, la fabrication ou la
                distribution de substances illicites ;
                • des propos incitant aux crimes ou aux délits ou qui en font l’apologie et plus particulièrement les
                crimes contre l’humanité ;
                • de porter atteinte aux droits de propriété intellectuelle de tiers (notamment textes, photographies)
                ou au droit à l’image des personnes (publication de la photographie d’une personne sans autorisation)
                pour lesquels vous ne disposez pas des autorisations nécessaires des auteurs et/ou ayants droit ;
                • de publier intentionnellement ou non du contenu faux, erroné ou trompeur ;
                • de publier des contenus faisant la promotion de services à but lucratif.
                Cette liste pourrait être complétée en fonction des dispositions légales et réglementaires actuelles.
                Le site UVCI comporte des informations mises à disposition par des utilisateurs ou des liens hypertextes
                vers d’autres sites qui ne sont pas édités par l’UVCI, mais fournis ou proposés par des tiers. Le
                contenu mis à disposition sur le site UVCI est fourni à titre indicatif. L’existence d’un lien du site
                UVCI vers un site externe ne constitue pas une validation du site externe ou de son contenu. Il vous
                appartient d’exploiter ces informations avec discernement et esprit critique. Le caractère raisonnable
                ou actuel, l’exactitude ou l’exhaustivité du contenu de ces informations n’est pas vérifié par l’UVCI.
                Dans ce cadre, l’UVCI rejette expressément toute responsabilité.
                Vous vous engagez également à :
                • Respecter les droits de propriété intellectuelle afférents aux contenus diffusés sur le site UVCI,
                ainsi que les droits de propriété intellectuelle des tiers conformément aux conditions d’utilisation
                propres à chaque cours proposé sur le site UVCI;
                • Respecter la vie privée des autres utilisateurs et, plus généralement, ne pas porter atteinte à leurs
                droits ;
                • Ne pas porter atteinte à la confidentialité et à la sécurité des données personnelles concernant les
                utilisateurs du site UVCI;
                • Ne pas collecter de quelque façon que ce soit des informations sur les utilisateurs, y compris leurs
                adresses e-mail, sans leur consentement.
                • Ne pas tricher pour améliorer vos résultats ;
                • Ne pas améliorer ou dégrader les résultats des autres ;
                • Ne pas publier les réponses aux exercices utilisés comme mode d’évaluation des apprenants.

                En cas de manquement par un utilisateur à l’une ou l’autre des règles précitées, l’UVCI se réserve le
                droit de lui bloquer l’accès à tout ou partie des services du site UVCI, de façon temporaire ou
                définitive, sans aucune contrepartie et notification à l’utilisateur.

                L’UVCI se réserve également le droit de retirer tout ou partie des contenus, informations et données de
                toute nature, que l’utilisateur aura mis en ligne sur le site UVCI.

                <h3>Modalités d’utilisation du compte utilisateur</h3>
                Afin de participer pleinement aux activités offertes par le site UVCI, vous devez fournir un nom
                complet, un nom d’utilisateur, une adresse électronique et un mot de passe afin de créer un compte
                d'utilisateur. Lors de l'installation de votre compte, vous pouvez être amené à donner des informations
                facultatives supplémentaires.

                Vous êtes seul responsable de garder confidentiels et non accessibles vos identifiants et mots de passe.
                En cas de perte ou de vol de ceux-ci ou dans l’éventualité où vous penseriez qu’un tiers a accédé à
                votre profil, vous vous engagez à informer l’UVCI via la page contact du site UVCI.

                Vous vous engagez à fournir des informations précises qui correspondent à votre situation actuelle. Vous
                consentez également à mettre à jour vos informations.

                Vous vous engagez également à ne pas créer une fausse identité de nature à induire qui que ce soit en
                erreur.

                L’UVCI s'engage à garantir la confidentialité et la sécurité de vos informations personnelles
                conformément à la Politique de Confidentialité.

                <h3>Règles d’utilisation des contenus diffusés sur le site</h3>
                Les contenus (textes, cours, photographies, vidéos, etc.) diffusés sur le site UVCI ne peuvent être
                utilisés qu’à des fins strictement personnelles.
                Sauf si les conditions d'utilisation des cours en ligne en disposent autrement, vous vous interdisez de
                reproduire et/ou d’utiliser les marques et logos présents sur le site UVCI, ainsi que de modifier,
                assembler, décompiler, attribuer, sous licencier, transférer, copier, traduire, reproduire, vendre,
                publier, exploiter et diffuser sous quelque format que ce soit, tout ou partie des informations, textes,
                photos, images, vidéos et données présents sur ce site. La violation de ces dispositions impératives
                vous soumet, et toutes personnes responsables, aux peines pénales et civiles prévues par la loi
                ivoirienne.

                <h3>Règles d’utilisation des contenus diffusés sur les cours en ligne hébergés par l’UVCI</h3>

                Vous vous engagez à respecter les conditions d'utilisation propres à chaque cours en ligne hébergé sur
                le site UVCI. Ces conditions sont définies pour chaque cours et sont disponibles dans la page de
                présentation de chaque cours. Ces conditions sont précisées au moment de votre inscription à un cours en
                ligne hébergé sur le site UVCI. En l’absence de précision lors de votre inscription à un cours en ligne,
                vous ne pouvez exploiter les contenus qu’à des fins privées et devez obtenir l’autorisation préalable
                des auteurs et les mentionner.

                Règles d’utilisation des contenus que vous diffusez dans le cadre des cours en ligne hébergés par l’UVCI
                auxquels vous êtes inscrits

                Avant de diffuser des contenus, vous vous assurez de disposer des autorisations nécessaires relatives
                aux droits d'auteur ou autres droits de propriété intellectuelle éventuellement attachés à votre
                contribution et/ou commentaire, à travers notamment leur reproduction et leur diffusion sur le site
                UVCI. Vous veillez notamment au respect des droits des tiers (droit d’auteur, droit des marques, droit
                de la personnalité).

                Lorsque vous diffusez des contenus dans le cadre des cours en ligne, vous autorisez la reproduction et
                la diffusion de ces contenus, pour le monde entier, dans le seul cadre des cours en ligne, sauf si les
                conditions d'utilisation de ces cours en disposent autrement.

                <h3>Utilisation des marques et des logos</h3>
                Les marques et les logos associés, présents sur le site UVCI sont protégés. Ils appartiennent par
                conséquent exclusivement aux organismes émetteurs. Vous ne pouvez utiliser aucun de ces signes ou leur
                variante sans l’accord préalable desdits organismes.

                <h3>Responsabilités</h3>
                Responsabilité de l’utilisateur
                L’ensemble du matériel et des logiciels nécessaires à l’accès et à l’utilisation du site UVCI est à
                votre charge. Vous êtes donc responsable du bon fonctionnement de votre matériel et de son accès
                internet. Vous êtes tenu de prendre toutes les mesures préventives nécessaires à la protection de ses
                données, logiciels et/ou systèmes informatiques pour se prémunir contre la contamination d’éventuels
                virus. L’usage des contenus mis à disposition par l’intermédiaire du site UVCI relève de votre seule
                responsabilité. Les faits ou actes que vous seriez amené à accomplir en considération de ces
                informations ne sauraient engager d’autre responsabilité que la vôtre. L’accès aux contenus mis à
                disposition sur le site UVCI relève de votre responsabilité et l’UVCI ne pourrait être tenu responsable
                pour les dégâts ou la perte de données qui pourraient résulter du téléchargement ou de l’utilisation des
                contenus diffusés sur le site UVCI.

                Vous êtes seul responsable à l’égard de l’UVCI et le cas échéant de tout tiers, de tous dommages,
                directs ou indirects, de quelque nature que ce soit, causés par un contenu, et ce quelle que soit sa
                nature, communiqué, transmis ou diffusé par vous, par l’intermédiaire du site, ainsi que pour toute
                violation des présentes conditions générales d'utilisation, la charte utilisateurs et la politique de
                confidentialité.

                <h3>Responsabilité de l’UVCI</h3>
                Le site UVCI est par principe accessible 24/24h, 7/7j, sauf interruption, programmée ou non, pour les
                besoins de sa maintenance ou cas de force majeure. Etant de fait soumis à une obligation de moyen,
                l’UVCI ne saurait être tenu responsable de tout dommage, quelle qu’en soit la nature, résultant d’une
                indisponibilité du site UVCI.

                L’UVCI met en œuvre tous les moyens raisonnables à sa disposition pour assurer un accès de qualité à ses
                utilisateurs, mais n'est tenu à aucune obligation d'y parvenir.

                L’UVCI ne peut, en outre, être tenu responsable de tout dysfonctionnement du réseau ou des serveurs ou
                de tout autre événement échappant au contrôle raisonnable, qui empêcherait ou dégraderait son accès.

                L’UVCI se réserve la possibilité d'interrompre, de suspendre momentanément ou de modifier sans
                communication préalable l'accès à tout ou partie de son site UVCI, afin d'en assurer la maintenance, ou
                pour toute autre raison, sans que l'interruption n'ouvre droit à aucune obligation, ni indemnisation.

                Sauf dans le cas où l’UVCI aurait été dûment informé de l'existence d'un contenu illicite au sens de la
                législation en vigueur, et n'aurait pas agi promptement pour le retirer, l’UVCI ne peut pas être tenu
                responsable de la diffusion de ces contenus.

                L’UVCI n’est pas responsable des contenus mis à disposition par les établissements dans les cours en
                ligne hébergés sur le site UVCI.

                En aucun cas, la responsabilité de l’UVCI ne pourra par ailleurs être recherchée à l’occasion des
                relations qui pourraient exister entre les utilisateurs et les cours en ligne hébergés par l’UVCI.

                <h3>Notifications</h3>
                Sauf stipulation expresse contraire, toute notification envoyée à l’UVCI doit être adressée via la page
                de contact du site UVCI

                Toute notification qui vous est destinée sera envoyée en principe par e-mail à l'adresse que vous avez
                communiquée sur le site UVCI lors de votre inscription d’où la nécessité de renseigner une adresse mail
                valide.

                Dans le cas où vous n’êtes pas inscrit sur la plateforme UVCI la notification de réponse vous sera
                envoyé à l’adresse mail utilisée pour poser votre question.

                Si vous souhaitez entrer en contact avec l’équipe UVCI, via les mails de contact prévu à cet effet dans
                la page contact, vous êtes informé que nous pouvons être amené à traiter les données que vous nous
                communiquez, parmi lesquelles :

                Nom ; Prénom ; Numéro de téléphone ; Fonction ; Adresse courriel ; Les informations utilisateurs (si
                vous êtes inscrit sur notre plateforme) ; Toutes autres informations reçues au travers des échanges
                Ces données sont traitées dans le cadre des finalités suivantes :
                • Apporter une réponse de qualité à vos demandes
                • Développer et améliorer notre service

                <h3>Juridiction compétente</h3>
                Les présentes Conditions générales d’utilisation, la charte d'utilisateurs, et la politique de
                confidentialité sont régies par la loi ivoirienne.

                Elles sont rédigées en français et en anglais. Les deux versions sont équivalentes et adéquates. En cas
                de contradiction, la version française prévaut.

                En tant qu'utilisateur du site UVCI, vous acceptez que tout litige relatif à l’interprétation, à
                l’exécution des présentes conditions générales d’utilisation, à la charte d'utilisateurs, à la politique
                de confidentialité et/ou grief lié au fonctionnement de ce site soit réglé devant une juridiction du
                ressort de l’UVCI et ce y compris en cas de référé, de requête ou de pluralité de défendeurs.

                Conditions générales de l’examen pour le certificat payant
                Deux types d’examen sont possibles, au choix de l’équipe pédagogique du , permettant de délivrer un
                certificat :
                A- Examen en présentiel
                B- Soumission des travaux et corrections en différé
                Ces deux types d’examen sont payants.

                Dans le cas A : examen en présentiel
                L’équipe pédagogique du vous fixera un rendez-vous pour passer un examen en présentiel. Afin d’organiser
                cet examen, vous acceptez que les données suivantes soient transférées à l’établissement qui organise
                cette épreuve : Prénom, Nom, Nom d'utilisateur UVCI, Adresse courriel.

                Ces données sont transférées pour organiser l’examen et établir des statistiques de fréquentation des
                examens. Les données ne seront pas conservées plus de 3 ans et seront détruites à l’issue de cette
                durée.

                Dans le cas B : Soumission des travaux et corrections en différé
                L’équipe pédagogique du vous donnera un ou plusieurs travaux à réaliser puis à leur rendre. Ces travaux
                sont susceptibles d’être déposés dans un espace informatique extérieur au site UVCI.

                Afin d’organiser cet examen, vous acceptez que les données suivantes soient transférées à
                l’établissement qui organise cette épreuve : Prénom, Nom, Nom d'utilisateur UVCI, Adresse courriel.

                Ces données sont transférées pour organiser l’examen et établir des statistiques de fréquentation des
                examens. Les données ne seront pas conservées plus de 3 ans et seront détruites à l’issue de cette
                durée.

                <h3>Charte utilisateurs</h3>
                En vous inscrivant sur le site UVCI, vous rejoignez une très large communauté d'apprenants. L'ambition
                de l’UVCI est de fournir un accès aux meilleures formations de l’enseignement supérieur et ce, quelle
                que soit votre localisation géographique.

                <h3>Recommandations aux utilisateurs</h3>
                Sauf indication contraire de l'enseignant du cours, vous êtes encouragés à :
                • Participer à l’ensemble des activités d’un cours : lecture des vidéos, exercices, devoirs et travaux
                pratiques ;
                • Discuter avec les autres apprenants des concepts généraux et des ressources de chaque cours en
                utilisant les outils collaboratifs mis à disposition ;
                • Proposer des idées et éventuellement proposer les documents que vous pourrez élaborer, aux autres
                apprenants à des fins de commentaires ;
                • Vous assurer que le nom complet est celui que vous souhaitez faire figurer sur vos attestations et
                certificats (*) ;
                • S'assurer que votre nom d'utilisateur est choisi avec soin car il n'est pas modifiable

                <h3>Engagements des utilisateurs</h3>
                En complément des règles de conduite précisées dans les Conditions Générales d’Utilisation, et à la
                Politique de Confidentialité, vous vous engagez à :
                • Ne pas tricher pour améliorer vos résultats ;
                • Ne pas améliorer ou dégrader les résultats des autres ;
                • Ne pas publier les réponses aux exercices pris en compte dans l’évaluation finale des étudiants ;
                • Respecter les droits de propriété intellectuelle accordés par la licence d’utilisation attachée à
                chaque cours en ligne sur le site UVCI (cf. conditions d’utilisation précisées sur la page de
                présentation / inscription de chaque cours) ;
                • Donner accès à l’équipe enseignante à vos données collectées sur le site UVCI pour les besoins du
                cours suivi.
                (*) A noter : une fois les attestations et/ou certifications éditées, il n’y aura plus de possibilité de
                modifier le nom complet sur ce document.

                <h3>Politique de confidentialité</h3>
                Confidentialité et sécurité des informations personnelles
                Nous nous soucions de la confidentialité et de la sécurité de vos informations personnelles. Nous
                mettrons en œuvre tous les moyens raisonnables pour les protéger (le terme « données personnelles » est
                défini ci-dessous). Toutefois, aucune méthode de transmission ou de stockage de données numériques n'est
                jamais complètement sécurisée, et nous ne pouvons donc pas garantir la sécurité de l'information
                transmise ou stockée sur le site UVCI.

                Notre politique de confidentialité s'applique uniquement aux informations collectées par le site , c’est
                à dire à tous les contenus et aux pages présentes dans le domaine uvci.edu.ci. Elle ne s'applique pas
                aux informations que nous pouvons recueillir de votre part par d'autres moyens, par exemple à celles que
                vous nous fournissez par téléphone, par fax, par mail ou par courrier conventionnel. En outre, veuillez
                noter que vos données personnelles sont protégées par les règles du droit ivoirien.

                En accédant ou en vous inscrivant sur ce site UVCI, vous consentez et acceptez le fait que les
                informations collectées vous concernant, puissent être utilisées et divulguées conformément à notre
                politique de confidentialité et nos conditions générales d'utilisation. Comme la loi peut l'exiger ou le
                permettre, ces informations peuvent être transférées, traitées et stockées potentiellement dans les pays
                des établissements producteurs de diffusés sur le site UVCI.

                Si vous n'acceptez pas ces termes, alors nous vous invitons à ne pas accéder, naviguer ou vous inscrire
                sur ce site UVCI. Si vous choisissez de ne pas nous fournir certaines informations nécessaires pour vous
                offrir nos services, vous ne pourrez pas ouvrir un compte utilisateur.

                Tel qu'utilisé dans la présente « politique de confidentialité », « données personnelles » désigne toute
                information vous concernant que vous nous fournissez lors de l'utilisation du site UVCI, par exemple
                lorsque vous créez un compte utilisateur ou concluez une transaction, ce qui peut inclure de manière non
                limitative votre nom, vos coordonnées, sexe, date de naissance et profession.

                <h3>Données personnelles</h3>
                Les données personnelles collectées par le site UVCI vous concernant vous appartiennent. Ces données
                sont protégées et non diffusées conformément à la loi ivoirienne.

                Ces données sont utilisées pour assurer la délivrance des services offerts par le site UVCI : délivrance
                de certificats et attestations, échanges de pairs à pairs, échanges entre l’équipe pédagogique et les
                apprenants, envoi d’informations de manière proactive, etc. Nous nous engageons à ce que ces données ne
                soient pas diffusées à des tiers, ni commercialisées sans votre accord explicite.

                Elles peuvent également être utilisées pour vous envoyer des mises à jour sur les cours en ligne offerts
                par UVCI ou d'autres événements, pour communiquer sur les produits ou les services du site UVCI ou
                affiliés, pour vous envoyer des messages électroniques à propos de la maintenance du site ou des mises à
                jour ou pour vous envoyer des newsletters.

                Les établissements membres et partenaires de l’UVCI partagerons l’information recueillie, y compris les
                renseignements personnels, avec des tierces parties, comme suit :
                • Avec les fournisseurs de services ou entrepreneurs qui effectuent certaines tâches en notre nom ou au
                nom des établissements. Ceci comprend les informations que vous nous faites parvenir ainsi que toute
                transaction au travers de l’exploitation de ce site ;
                • Avec les autres visiteurs du site, dans la mesure où vous soumettez des commentaires, des devoirs ou
                toute autre information ou du contenu à une zone du site conçue pour les communications avec le public
                et avec d'autres membres d'un cours de l’UVCI auquel vous participez. Nous pouvons proposer vos
                contributions aux étudiants qui s'inscriraient plus tard dans les mêmes cours, dans le cadre de forums,
                de didacticiels ou autrement. Si vous nous soumettez vos contributions dans des parties non publiques,
                nous les publierons anonymement, sauf avec votre permission explicite, mais nous pouvons utiliser votre
                nom d'utilisateur pour les afficher à l’intention des autres membres de votre cours ;
                • Afin de répondre aux citations à comparaître, ordonnances de tribunal ou une autre procédure
                judiciaire, en réponse à une demande de coopération de la police ou un autre organisme gouvernemental,
                en cas d'enquête, pour prévenir ou prendre des mesures concernant des activités illégales, fraude, aux
                fins de sécurité ou contre des techniques à enjeux suspects, ou pour appliquer nos conditions
                d'utilisation, la charte utilisateur ou cette politique de confidentialité, tel qu'il peut être requis
                par la loi ou pour protéger nos droits, notre propriété ou notre sécurité ou celles des autres ;
                • Pour vous permettre de communiquer avec d’autres utilisateurs qui pourraient avoir des intérêts ou des
                objectifs éducatifs similaires aux vôtres. Par exemple, nous pouvons vous recommander des partenaires
                pour une étude spécifique ou mettre en relation des étudiants potentiels avec des enseignants. Dans de
                tels cas, nous pouvons utiliser les informations collectées à votre sujet afin de déterminer qui
                pourrait être intéressé à communiquer avec vous, mais nous ne fournirons pas votre nom à d'autres
                utilisateurs, et ne divulguerons pas votre vrai nom ou adresse e-mail sans votre consentement explicite
                ;
                • Pour l'intégration de services tiers. Par exemple, un site externe d’hébergement de contenus vidéo ou
                d'autres sites externes à l’UVCI.
                En outre, nous pouvons partager des informations qui ne vous identifient pas personnellement
                (anonymisées), avec le public et avec des tiers, y compris, par exemple, des chercheurs.

                <h3>Données d’usage</h3>
                Les données d’usage sont les données collectées par le site UVCI et concernent les usages des services
                du site. Il s’agit de données brutes, totalement anonymisées, utilisées pour produire des statistiques
                sur l’utilisation des services du site , et dont l’analyse permet d’améliorer les services et les
                fonctionnalités du site. Nous collectons des informations lorsque vous vous créez un compte utilisateur,
                participez à des cours en ligne, envoyez des messages courriel et / ou participez à nos forums, nos
                wiki…. Nous recueillons des informations sur les performances et les modes d'apprentissage des
                apprenants. Nous enregistrons des informations indiquant, entre autres, les pages de notre site ayant
                été visitées, l'ordre dans lequel elles ont été visitées, quand elles ont été visitées et quels sont les
                liens et autres contrôles de l'interface utilisateur qui ont été utilisés.

                Nous pouvons enregistrer l'adresse IP, le système d'exploitation et le navigateur utilisé par chaque
                utilisateur du site . Divers outils sont utilisés pour recueillir ces informations. Les données d’usage
                peuvent être utilisées :
                • Pour permettre aux établissements de proposer, administrer et améliorer leurs cours ;
                • Pour nous aider, nous et les établissements, à améliorer l'offre de UVCI, de manière individuelle (par
                exemple au travers de l'équipe pédagogique travaillant avec un apprenant) et de manière globale pour
                personnaliser l'expérience et évaluer l'accessibilité et l'impact de UVCI dans la communauté éducative
                internationale;
                • À des fins de recherche scientifique, en particulier dans les domaines des sciences cognitives et de
                l'éducation ;
                • Pour suivre la fréquentation, à la fois individuelle et globale, la progression et l'achèvement d'un
                cours en ligne et pour analyser les statistiques sur la performance des apprenants et la façon dont ils
                apprennent ;
                • Pour détecter des violations de la charte utilisateur, la manière d’utiliser le site UVCI ainsi que
                des utilisations frauduleuses ou l'étant potentiellement ;
                • Pour publier des informations, mais pas des données personnelles, recueillies par UVCI sur les accès,
                l'utilisation, l'impact et la performance des apprenants ;
                • Pour archiver ces informations et / ou les utiliser pour des communications futures avec vous ;
                • Afin de maintenir et d'améliorer le fonctionnement et la sécurité du site et de nos logiciels,
                systèmes et réseaux.

                <h3>Gestion des données personnelles et des données d’usage</h3>
                Le Responsable du Traitement des données à caractère personnel est l’équipe de l’UVCI

                <h3>Finalités de la collecte des données</h3>
                La collecte des données sur le site UVCI facilite l’accès au service proposé depuis et est réalisée afin
                :
                • de permettre l’accès et l’inscription aux cours diffusés sur le site UVCI;
                • de permettre le suivi des cours, la participation aux activités pédagogiques et aux évaluations, la
                délivrance d’attestations et/ou de certificat ;
                • d’effectuer des travaux de recherche pour réaliser des études statistiques après anonymisation ;
                • d’inscrire le cours dans le cadre d’une formation plus large délivrée par l’établissement de
                l’Enseignement Supérieur et de la Recherche sur le campus, en formation initiale.

                <h3>Diffusion des données collectées</h3>
                Les données ainsi collectées pourront être transmises aux personnels de l’UVCI ainsi qu’à tous tiers
                chargés de participer à la mise en place, à la réalisation ou au suivi de votre inscription.

                Les personnels de l’UVCI ainsi que les tiers désignés par ce dernier, auront accès et pourront utiliser
                les données collectées dans le but de fournir les services proposés sur le site .

                En aucun cas, les données collectées ne seront cédées à des tiers, que ce soit à titre gracieux ou
                onéreux.

                <h3>Durée de conservation</h3>
                Sont conservées :
                1/ Les données à caractère personnel collectées, pendant une durée de cinq ans à compter de la dernière
                activité de l'utilisateur sur le site UVCI. À l'issue de cette durée réglementaire de conservation des
                données, les données permettant d’identifier l’utilisateur sont anonymisées : Nom, prénom, email et nom
                d'utilisateur.

                2/ Les données concernant les apprenants qui souhaitent passer l’examen surveillé, le sous-traitant
                conservera les données pour les durées suivantes :
                • Nom, prénom, adresse, ville, numéro de téléphone, fuseau horaire, pays : un an.
                • Enregistrement vidéo et audio de l’examen, photo de l’apprenant pris au début de l’examen, photo de la
                pièce d’identité : 6 semaines

                <h3>Utilisations de Cookies</h3>
                Certaines informations sont collectées au moyen de cookies (de petits fichiers texte placés sur votre
                ordinateur qui stockent des informations vous concernant et qui peuvent être consultés par le site).

                Un cookie ne nous permet pas de vous identifier. De manière générale, il enregistre des informations
                relatives à la navigation de votre ordinateur sur notre site (les pages que vous avez consultées, la
                date et l’heure de la consultation, etc.) que nous pourrons lire lors de vos visites ultérieures. En
                l’espèce, il contient les informations que vous avez fournies. Ainsi, vous n’aurez pas besoin, lors de
                votre prochaine visite de remplir à nouveau le formulaire que nous vous avons proposé.

                Nous vous informons que vous pouvez vous opposer à l’enregistrement de cookies en configurant votre
                navigateur (dans le menu « outil options » de Mozilla Firefox ou de Microsoft Explorer). La plupart des
                navigateurs fournissent les instructions pour les refuser dans la section « Aide » de la barre d'outils.
                Si vous refusez nos cookies, des fonctions et fonctionnalités de ce site pourraient ne pas fonctionner
                correctement.

                Services externes
                Le site UVCI peut donner accès à des liens vers d'autres sites publiés par d'autres fournisseurs de
                contenu. Ces autres sites ne sont pas sous notre contrôle, et vous reconnaissez et acceptez que nous ne
                sommes pas responsables de la collecte et de l'utilisation de vos informations par ces sites. Nous vous
                encourageons à lire les politiques de confidentialité de chaque site que vous visitez et utilisez.

                Noms d'utilisateurs et messages
                Les commentaires et autres informations que vous publiez dans nos forums, wikis ou d'autres zones du
                site conçus pour les communications publiques, peuvent être consultés et téléchargés par d'autres
                visiteurs du site. Pour cette raison, nous vous encourageons à faire preuve de discrétion avant de
                publier toute information qui pourrait être utilisée pour vous identifier sur ces forums ou d’autres
                endroits publics ou réservés à un cours.
            </div>
        </div>
    </div>
</section>
<!-- Destination Ends -->

@endsection()

@section('js')
<script src="{{asset('template/js/jquery-3.2.1.min.js')}}"></script>
@endsection()