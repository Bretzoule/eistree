--
-- Déchargement des données de la table `categories`
--

USE eistree;

INSERT INTO `categories` (`id`, `nom`)
VALUES (1, 'arbustes'),
  (2, 'plantesf'),
  (3, 'plantesI');
-- --------------------------------------------------------
-- Déchargement des données de la table `produits`
--
INSERT INTO `produits` (
    `id`,
    `nom`,
    `nomscien`,
    `img`,
    `prix`,
    `description`,
    `hauteur`,
    `temp`,
    `feuillage`,
    `arrosage`,
    `floraison`,
    `luminosite`,
    `stock`,
    `categoryid`
  )
VALUES (
    'chamaedorea',
    'Chamaedora',
    'Chamaedora Elegans',
    '/images/chamaedorea.jpg',
    8,
    'Petit palmier facile d''entretien, le chamaedorea assainit l''air et supporte la fumée.',
    NULL,
    'Entre 13°C et 25°C',
    NULL,
    '3x/semaine en été, 1x/semaine en hiver',
    NULL,
    'Lumière vive sans soleil ou mi-ombre',
    100,
    3
  ),
  (
    'citronnier',
    'Citronnier 4 saisons',
    'Citrus Limon',
    '/images/citronnier.jpg',
    60,
    'Donnant des fruits à toutes les saisons, le citronnier est cependant cultivable en pleine terre uniquement sur le pourtour méditerranéen.',
    '3 à 5 mètres',
    'Jusqu''à 3 ° C',
    'Persistant',
    NULL,
    NULL,
    NULL,
    100,
    1
  ),
  (
    'erable',
    'Erable',
    'Acer Japonicum',
    '/images/erable.jpg',
    240,
    'Cet arbre originaire du Japon égaye les jardins par son feuillage rouge orangé.',
    '6 mètres',
    'Jusqu''à -15°C',
    'Caduc',
    NULL,
    NULL,
    NULL,
    100,
    1
  ),
  (
    'rincebouteille',
    'Rince Bouteille',
    'Callistemon Citrinus',
    '/images/rincebouteille.jpg',
    40,
    ' Fleurissant l''été, le callistemon -ou rince-bouteille- peut être planté en pleine terre uniquement dans les régions au climat doux.',
    '1 à 3 mètres',
    'Jusqu''à -6°C',
    'Persistant',
    NULL,
    'De Juin à Août',
    NULL,
    100,
    1
  ),
  (
    'monsteradeliciosa',
    'Monstera',
    'Monstera Deliciosa',
    '/images/monstera.jpg',
    12,
    'La monstera, ou faux philodendron, est une plante vivace de la famille des Araceae. <br> Facile d''entretien, cette plante est idéale pour décorer la maison.',
    NULL,
    'Entre 13°C et 25°C',
    NULL,
    '1x/semaine, à espacer en hiver',
    NULL,
    'Tout type de luminosité',
    100,
    3
  ),
  ('epipremnumaureum',
    'Pothos',
    'Epipremnum Aureum',
    '/images/pothos.jpg ',
    8,
    ' Plante grimpante très facile d''entretien, le pothos est la plante idéale pour les débutants. <br> Attention à ne pas en planter dans votre jardin si vous habitez en Floride, car c''est une plante invasive dans cette région.',
    NULL,
    'Entre 16°C et 22°C',
    NULL,
    '2x/semaine en été, 1x/semaine en hiver',
    NULL,
    'Lumière vive sans soleil ou mi-ombre',
    100,
    3
  ),
  ('hibiscus',
    'Hibiscus',
    'Hibiscus Syriacus',
    '/images/hibiscus.jpg ',
    40,
    'L''hibiscus est un genre d''arbuste de la famille des Malvaceae. En grec, le terme hibiscus signifie "Guimauve".',
    NULL,
    'Jusqu''à -15°C',
    'Caduc',
    NULL,
    'De Juillet à Septembre',
    NULL,
    100,
    2
  ),
  ('strelitzia',
    'Strelitzia',
    'Strelitzia Reginae',
    '/images/strelitzia.jpg ',
    35,
    'Le strelitzia est une plante vivace tropicale d''origine sud-africaine pouvant atteindre 6m de hauteur.',
    NULL,
    'Jusqu''à -15°C',
    'Persistant',
    NULL,
    'De Juin à Juillet',
    NULL,
    100,
    2
  ),
  ('bougainvillier',
    'Bougainvillier',
    'Bougainvillea Glabra',
    '/images/bougainvillier.jpg ',
    28,
    'Originaire du Brésil, le bougainvillier apporte une touche méditerranéenne à n''importe quel jardin.',
    NULL,
    'Pas moins de 5°C',
    'Persistant',
    NULL,
    'De Mai à Novembre',
    NULL,
    100,
    2
  );
-- --------------------------------------------------------
-- Déchargement des données de la table `users`
--
INSERT INTO `users` (`mail`, `uuid`, `nom`, `prenom`, `pass`)
VALUES (
    'ah@ah.fr',
    'user_608366fa8de54',
    'oui',
    'zjhdau',
    '$2y$10$GOg/z40Xt.0XvfCFkMAfFOPb7S2N4Zggk4YXtiLtxvJvghiLMvSN6'
  ),
  (
    'contact@eistree.eu',
    'user_606a1e5abcbh7',
    'Admin',
    'Eistree',
    '$2y$10$xIwyASVrQOTWkTArjzBxd.EfC7SwYRd4DR8E71H7xIwu6b8fefWhO'
  ),
  (
    'oui@oui.fr',
    'user_606a1e5abcb8d',
    'ZJDIOJ',
    'oijfdeziojdio',
    '$2y$10$hjnUwVD026VacR1PLqWy..ZHI8kotTNy9LRLVINlP2LZaRCxiMXpK'
  ),
  (
    'toto@ex.fr',
    'user_6083631c83ff0',
    'Tom',
    'Lef',
    '$2y$10$Mnz7Wlh4cdY/nCKSlNcC5.Q9Vn.V706PDqeEoSxbfjuWidGrWFHeC'
  );