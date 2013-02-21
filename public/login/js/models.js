//Backbone.emulateHTTP = true;

var BlockItem = Backbone.Model.extend({
	//idAttribute: '_id',
	//urlRoot: '/blocks',
	defaults: {
		title: "new title",
		description: "new description",
		//status: "unsaved"
	}
});

var descriptionBlock = new BlockItem({
	_id: 1,
	title: "descripcion",
	description: "El Bar Mô es un nuevo concepto de local situado en el centro de Pamplona. Decorado con gusto, el Bar Mô te ofrece un ambiente cálido con variedad de pinchos, cafés y una divertida selección de vinos. Además, nuestra música lounge y de vanguardia hará de tu estancia una experiencia única."
});

var chartBlock = new BlockItem({
	_id: 2,
	title: "Nuestra Carta",
	description: "Nuestra carta te ofrece los pinchos y tapas más actuales, innovando y renovándolas constantemente. Disponemos de fritos, tostas, raciones y brochetas. Bar Mô te ofrece una moderna carta de vinos para que acompañes tus pinchos. Si prefieres tomar un café, prueba uno de nuestros Nespressos. Especialistas en gin tonics, el ambiente cálido está garantizado con la música lounge y de vanguardia."
});

/*
var timeBlock = new BlockItem({
	_id: 3,
	title: "Horario",
	description: "Abrimos a las 8:00 de lunes a viernes, sábado y domingo a las 11:00."
});
*/

function blockCreate(sec, cat){
var object = 'petition.php';
 
    $.post(object, { section: sec, category: cat }, function(data) {    
        return new BlockItem(JSON.parse(data));
    });

}


/*var object = 'petition.php';
 
    $.post(object, { section: "informacion", category: "horario" }, function(data) {    
        window.timeBlock = new BlockItem(JSON.parse(data));
    });
    */




