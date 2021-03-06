INSERT INTO `entreprises` (`id`, `nom_commercial`, `activite`, `numero_identification`, `date_creation`, `effectif`, `ville`, `complement`, `bp`, `email`, `telephone`, `facebook`, `linkedin`, `youtube`, `instagram`, `twitter`, `telegram`, `description`, `logo`, `statut`, `created_at`, `updated_at`, `secteur_activite_id`, `forme_juridique_id`, `country_id`, `dirigeant_id`) VALUES
(1, 'TEHNOSTRUCTURE', 'DEV', '6545656', '2021-08-03', '1-5', '18216', '65555', '44556', 'essonoabagas@gmail.com', '066826532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'images_logos/WGCBvNdYDmTg4RtxsoEHY1gjaowIm0ULCkdoKwxX.jpg', 0, '2021-08-04 14:24:24', '2021-08-04 14:24:24', 3, 3, 79, 1);
INSERT INTO `entreprises` (`id`, `nom_commercial`, `activite`, `numero_identification`, `date_creation`, `effectif`, `ville`, `complement`, `bp`, `email`, `telephone`, `facebook`, `linkedin`, `youtube`, `instagram`, `twitter`, `telegram`, `description`, `logo`, `statut`, `created_at`, `updated_at`, `secteur_activite_id`, `forme_juridique_id`, `country_id`, `dirigeant_id`) VALUES
(2, 'FONTECSYS', 'DEV', '6238966', '2021-08-08', '1-10', '43216', '98555', '14556', 'christian@gmail.com', '076826532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'images_logos/WGCBvNdYDmTg4RtxsoEHY1gjaowIm0ULCkdoKwxX.jpg', 0, '2021-08-04 14:24:24', '2021-08-04 14:24:24', 3, 3, 79, 1);


INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `online`, `userable_id`, `userable_type`, `created_at`, `updated_at`, `profil_id`, `entreprise_id`) VALUES
(1, 'Essono', 'Abagas', 'essonoabagas@gmail.com', '2021-08-04 14:24:24', '$2y$10$xLL0eL28qf5oIQviozRgrOa/Xoi9hhXuySX/N4BfzKHZzNoRhkNiG', NULL, NULL, 'p8nKIwjUd1SSfN5ij1DRyaEPWxRKUZv14wnX5D2cmdOdjHrdmg4QmXr7NBSJ', NULL, 'images_profils/WGCBvNdYDmTg4RtxsoEHY1gjaowIm0ULCkdoKwxX.jpg', 0, '1', 'App\\Models\\Dirigeant', '2021-08-04 14:24:24', '2021-08-04 14:24:24', 2, 1);

INSERT INTO `dirigeants` (`id`, `nom`, `prenom`, `sexe`, `datenaiss`, `initiales`, `signature`, `created_at`, `updated_at`) VALUES
(1, 'Essono', 'Abagas', 'M', '1995-02-05', 'template/vendors/images/default.png', 'template/vendors/images/default.png', '2021-08-04 14:24:24', '2021-08-04 14:24:24');

INSERT INTO `employes` (`id`, `matri_emp`, `nom_emp`, `prenom_emp`, `sexe_emp`, `email`, `password`, `password_conf`, `datenaiss_emp`, `telephone_emp`, `nif_emp`, `bp_emp`, `ville_emp`, `quartier_emp`, `situation_emp`, `has_child`, `is_archived`, `nb_enfant`, `photo_emp`, `initiales_emp`, `signature_emp`, `nom_conj`, `prenom_conj`, `nif_conj`, `datenaiss_conj`, `telephone_conj`, `profession_conj`, `is_deceased`, `date_deces_conj`, `bp_conj`, `ville_conj`, `employeur_conj`, `created_at`, `updated_at`, `nationalite_id`, `service_id`, `entreprise_id`, `profil_id`) VALUES (NULL, '1', 'Mbaiwodji', 'Bienvenue', 'M', 'bienvenue@gmail.com', 'password', 'password', '2021-07-15 00:00:00', '65844555', '544566', '65444', 'Libreville', '1', 'Celibataire', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '2021-07-15 00:00:00', NULL, '3', '2', '1', '1');
INSERT INTO `employes` (`id`, `matri_emp`, `nom_emp`, `prenom_emp`, `sexe_emp`, `email`, `password`, `password_conf`, `datenaiss_emp`, `telephone_emp`, `nif_emp`, `bp_emp`, `ville_emp`, `quartier_emp`, `situation_emp`, `has_child`, `is_archived`, `nb_enfant`, `photo_emp`, `initiales_emp`, `signature_emp`, `nom_conj`, `prenom_conj`, `nif_conj`, `datenaiss_conj`, `telephone_conj`, `profession_conj`, `is_deceased`, `date_deces_conj`, `bp_conj`, `ville_conj`, `employeur_conj`, `created_at`, `updated_at`, `nationalite_id`, `service_id`, `entreprise_id`, `profil_id`) VALUES (NULL, '2', 'Mbaide', 'Espoir', 'M', 'espoir@gmail.com', 'password', 'password', '2021-07-15 00:00:00', '65844555', '544566', '65444', 'Libreville', '1', 'Celibataire', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '2021-07-15 00:00:00', NULL, '3', '2', '1', '1');
INSERT INTO `employes` (`id`, `matri_emp`, `nom_emp`, `prenom_emp`, `sexe_emp`, `email`, `password`, `password_conf`, `datenaiss_emp`, `telephone_emp`, `nif_emp`, `bp_emp`, `ville_emp`, `quartier_emp`, `situation_emp`, `has_child`, `is_archived`, `nb_enfant`, `photo_emp`, `initiales_emp`, `signature_emp`, `nom_conj`, `prenom_conj`, `nif_conj`, `datenaiss_conj`, `telephone_conj`, `profession_conj`, `is_deceased`, `date_deces_conj`, `bp_conj`, `ville_conj`, `employeur_conj`, `created_at`, `updated_at`, `nationalite_id`, `service_id`, `entreprise_id`, `profil_id`) VALUES (NULL, '3', 'Djerabe', 'Arsène', 'M', 'arsene@gmail.com', 'password', 'password', '2021-07-15 00:00:00', '65844555', '544566', '65444', 'Libreville', '1', 'Celibataire', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '2021-07-15 00:00:00', NULL, '3', '2', '1', '1');

INSERT INTO `article_type_contrat` (`id`, `position`, `contenu`, `created_at`, `updated_at`, `article_id`, `type_contrat_id`) 
VALUES  (NULL, '1', 'Le présent contrat est soumis au Code du Travail institué par la loi N° 3/94 du 21 novembre 1994, à tous les textes pris en application de la loi susvisée, à la convention collective ainsi qu’au règlement intérieur applicable à l’entreprise.', NULL, NULL, '1', '1'), 
        (NULL, '2', 'Le présent contrat est soumis au Code du Travail institué par la loi N° 3/94 du 21 novembre 1994, à tous les textes pris en application de la loi susvisée, à la convention collective ainsi qu’au règlement intérieur applicable à l’entreprise.', NULL, NULL, '2', '1'),
        (NULL, '3', 'Le Travailleur est recruté à Libreville, qui sera son lieu d’affection. Cependant, selon les nécessités de l’entreprise, il pourra effectuer des déplacements sur le territoire de la République Gabonaise, et même en dehors.
        Les éventuels suppléments de rémunération feront l’objet d’un examen le cas échéant.', NULL, NULL, '3', '1'),
        (NULL, '4', 'Le présent contrat est conclu pour une durée de 6 mois, du 04 décembre 2019 au 03 juin 2020.
        Le présent contrat inclut une période d’essai de deux (02) mois renouvelable.
        Au cours de ladite période, et suivant les dispositions du Code du Travail, les parties pourront se séparer sans préavis ni indemnité d’aucune sorte. Le présent contrat est conclu pour une durée de 6 mois, du 04 décembre 2019 au 03 juin 2020.
        Le présent contrat inclut une période d’essai de deux (02) mois renouvelable.
        Au cours de ladite période, et suivant les dispositions du Code du Travail, les parties pourront se séparer sans préavis ni indemnité d’aucune sorte.', NULL, NULL, '4', '1'),
        (NULL, '5', 'Le présent contrat est conclu pour une durée de 6 mois, du 04 décembre 2019 au 03 juin 2020.
        Le présent contrat inclut une période d’essai de deux (02) mois renouvelable.
        Au cours de ladite période, et suivant les dispositions du Code du Travail, les parties pourront se séparer sans préavis ni indemnité d’aucune sorte.', NULL, NULL, '5', '1'),
        (NULL, '6', 'Le Travailleur sera affilié à l’Employeur auprès des organismes de sécurité, protection et de garantie sociale que sont la Caisse Nationale de Sécurité Sociale et la Caisse Nationale d’Assurance Maladie et de Garantie Sociale. 
        L’employeur pourra également souscrire une assurance volontaire santé auprès d’une compagnie locale.', NULL, NULL, '6', '1'),
        (NULL, '7', 'Le Travailleur sera affilié à l’Employeur auprès des organismes de sécurité, protection et de garantie sociale que sont la Caisse Nationale de Sécurité Sociale et la Caisse Nationale d’Assurance Maladie et de Garantie Sociale. 
        L’employeur pourra également souscrire une assurance volontaire santé auprès d’une compagnie locale.', NULL, NULL, '7', '1'),
        (NULL, '8', 'Conformément à l’article 19 du Code du Travail, l’entrée en vigueur du présent contrat est conditionnée par la délivrance d’un certificat médical par un médecin désigné par l’Employeur. Ledit certificat doit attester que l’Employeur est apte à exercer ses fonctions et qu’il est indemne de toutes affections contagieuses.', NULL, NULL, '8', '1'),
        (NULL, '9', 'Conformément à l’article 19 du Code du Travail, l’entrée en vigueur du présent contrat est conditionnée par la délivrance d’un certificat médical par un médecin désigné par l’Employeur. Ledit certificat doit attester que l’Employeur est apte à exercer ses fonctions et qu’il est indemne de toutes affections contagieuses.', NULL, NULL, '9', '1'),
        (NULL, '10', 'Conformément à l’article 19 du Code du Travail, l’entrée en vigueur du présent contrat est conditionnée par la délivrance d’un certificat médical par un médecin désigné par l’Employeur. Ledit certificat doit attester que l’Employeur est apte à exercer ses fonctions et qu’il est indemne de toutes affections contagieuses.', NULL, NULL, '10', '1'),
        (NULL, '11', 'Le présent contrat est susceptible de présenter des omissions. Ainsi, le Code du Travail, et autres textes assimilés en vigueur en République Gabonaise serviront de base.
        D’autre part, tout différend relatif à la conclusion, exécution ou résiliation du présent contrat de travail sera réglé en dernier ressort par le Tribunal du Travail de Libreville sur le territoire national.', NULL, NULL, '11', '1');