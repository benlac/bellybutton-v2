import header_business from '../../images/business_header.png';
import discussion from '../../images/icons/discussion.png';
import heart from '../../images/icons/heart.png';
import picture from '../../images/icons/picture.png';
import eyes from '../../images/Eyes.png';
import brain from '../../images/Brain.png';
import charts from '../../images/Charts.png';
import chip from '../../images/Chip.png';
import social from '../../images/Social.png';
import teams from '../../images/illu_plus_business.png'


export default [
  {
    header: 
      {
        title: 'Des millions de vues <br /> à portée de clic',
        firstSection: 'Une équipe d\'experts et de passionés, des outils <br /> puissants et un vrai suivi à votre disposition. <br /> Recevez votre devis de campagne d\'influence <br /> personnalisé sous 24 heures.',
        link: 'Obtenez votre solution <strong>sur mesure</strong>',
        secondSection: 'Audit complet gratuit, sans engagement, sans carte bancaire',
        illu: header_business,
        alt: 'Illustration représentant les médias sociaux',
        firstIcon: discussion,
        secondIcon: heart,
        thirdIcon: picture,
      },
    affecting: 
      {
        
      },
    solutions: 
      {
        title: 'Une opération commerciale réussie :',
        subtitle: 'Notre solution tout-en-un',
        cards: [
          {
            id: 1,
            illu: eyes,
            title: 'Une analyse minutieuse',
            content: 'Analyse de la situation du client et offre sur mesure. Quelle plateforme choisir ? Quel talent choisir pour représenter ma marque? Quels sont les indicateurs clefs à regarder pour établir ma campagne? Nous adaptons notre solution d\’influence à vos besoins et contraintes réels. IRM, analyse et proposition sur mesure, pour une prestation sans commune mesure !',
          },
          {
            id: 2,
            illu: social,
            title: 'Un catalogue d\'influenceurs',
            content: 'Nos influenceurs multiplateformes couvrent des thématiques variées et possèdent des  communautés de tailles différentes, nous permettant de recommander à nos clients les KOLs de leur marché, pour la réalisation de campagnes d\'influences d’autant plus impactantes.',
          },
          {
            id: 3,
            illu: chip,
            title: 'Une technologie prioritaire',
            content: 'Notre intelligence artificielle conçue par nos experts nous permet de prédire et de selectionner les audiences les plus adaptées. (manque une phrase)',
          },
          {
            id: 4,
            illu: brain,
            title: 'Des idées innovantes',
            content: 'Notre équipe met à votre disposition tout son savoir faire en matière de tendances pour vous assurer des campagnes en phase avec les attentes du marché, pour un taux de conversion encore et toujours optimisé.',
          },
          {
            id: 5,
            illu: charts,
            title: 'Des statistiques digestes',
            content: 'Pour vous permettre de suivre l\’évolution des KPIs importants, d\’intégrer les statistiques à vos reportings internes et à votre stratégie de communication globale ou encore d\’optimiser vos campagnes futures, nous proposons un dashboard de reportings en temps réel.',
          },
        ]
      },
    teams: 
      {
        title: 'Notre petit plus ?',
        subitile: 'Une équipe de créatifs 3.0 pour des concepts et efficaces',
        span: 'viraux',
        content: 'Vous avez besoin d\’aide pour gérer votre carrière? négocier vos contrats ? avez-besoin d\'écoute? de conseils? Mettez votre passion au service des marques qui vous font vibrer. Monétisez votre audience avec Bellybutton tout en gardant un oeil en temps réel sur vos campagnes grâce à la disponibilité de nos équipes et votre espace influenceur. Engagez votre audience. Nous gérons la collaboration avec les marques pour vous. <br />Parce que la gestion de la relation avec les marques est souvent chronophage. Parce que que votre métier est de vous concentrer sur la création de contenu pour votre audience. Parce que les marques engagées et engageantes nécessitent un traitement premium.',
        illu: teams,
        alt: 'Illustration représentant les médias sociaux'
      },
  },
]