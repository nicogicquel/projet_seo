
	// on récupère le DOM de la liste de Region
	var $region = $('#seobundle_form_region');

	// quand la valeur sélectionnée dans la liste de Region change
	$region.change(function() {
		// on récupère le DOM du formulaire
		var $form = $(this).closest('form');
		var data = {};

		// On remplie les données qui seront envoyées
		data[$region.attr('name')] = $region.val();

		$.ajax({
			url : $form.attr('action'),
			type: $form.attr('method'),
			data : data,
			success: function(html) {
				// Si la requête est OK, on remplace la liste de Modèles par celle renvoyée par le serveur
				$('#seobundle_form_departement').replaceWith(
					$(html).find('#seobundle_form_departement')
				);
			}
		});
	});
