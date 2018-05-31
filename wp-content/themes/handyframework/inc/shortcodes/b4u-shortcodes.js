(function() {
    tinymce.create('tinymce.plugins.Wptuts', {
        init : function(ed, url) {
            ed.addButton('b4ubutton', {
                title : 'Button',
                cmd : 'b4ubutton',
                image : url + '/button.png'
            });

            ed.addButton('b4ubuttonalt', {
                title : 'Button Alternative',
                cmd : 'b4ubuttonalt',
                image : url + '/button.png'
            });
 
            ed.addButton('b4ulead', {
                title : 'Lead text',
                cmd : 'b4ulead',
                image : url + '/lead.png'
            });

             ed.addButton('b4uh1', {
                title : 'H1',
                cmd : 'b4uh1',
                image : url + '/h1.png'
            });

             ed.addButton('b4uh2', {
                title : 'H2',
                cmd : 'b4uh2',
                image : url + '/h2.png'
            });

             ed.addButton('b4uh3', {
                title : 'H3',
                cmd : 'b4uh3',
                image : url + '/h3.png'
            });

             ed.addButton('b4uh4', {
                title : 'H4',
                cmd : 'b4uh4',
                image : url + '/h4.png'
            });

             ed.addButton('b4uh5', {
                title : 'H5',
                cmd : 'b4uh5',
                image : url + '/h5.png'
            });

    
             ed.addButton('b4uloop', {
                title : 'Custom Query',
                cmd : 'b4uloop',
                image : url + '/loop.png'
            });

            ed.addButton('2cols', {
                title : '2 columns text',
                cmd : '2cols',
                image : url + '/2-col.png'
            });

            ed.addButton('text', {
                title : 'Default text',
                cmd : 'text',
                image : url + '/t.png'
            });
 
            ed.addCommand('b4ubutton', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                //return_text = '<a href="#" class="button">' + selected_text + '</a>';
                return_text = '[b4ubutton url="#" title=""]' + selected_text + '[/b4ubutton]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4ubuttonalt', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                //return_text = '<a href="#" class="button">' + selected_text + '</a>';
                return_text = '[b4ubuttonalt url="#" title=""]' + selected_text + '[/b4ubuttonalt]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4ulead', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="lead">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4uh1', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h1">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4uh2', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h2">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4uh3', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h3">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4uh4', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="h4">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('b4uh5', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[b4uh5]' + selected_text + '[b4uh5]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

             

             ed.addCommand('b4uloop', function() {
                // var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[b4uloop the_query="post_type=post&posts_per_page=-1" template=""]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('2cols', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="cols-2">' + selected_text + '</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
            ed.addCommand('text', function() {
                var url = window.location.href;
                var arr = url.split("/");
                var domain = arr[0] + "//" + arr[2];
                return_text = '<p>En hier komt jouw tekst te staan! Het is namelijk van groot belang om je website te voorzien van goede content. Je wilt je bezoekers immers overtuigen, aan het denken zetten of aanzetten tot een bepaalde actie. Zonder een pakkende en aantrekkelijke tekst is dat bijna onmogelijk.</p><p>Wat we dus van jou verwachten is een tekst voor deze pagina, het liefst met een aanvaardbare lengte (neem als minimumlengte 150 woorden). Dit is namelijk niet alleen voor de informatievoorziening belangrijk; ook Google waardeert je website beter als je gebruik maakt van goede teksten. Deze tekst ontvangen we graag – eventueel samen met de andere nog ontbrekende teksten – in een Word-document, waarbij je duidelijk aangeeft voor welke pagina(‘s) de tekst(en) bedoeld is/zijn.</p><p>Wellicht vind je het lastig om zelf teksten te schrijven of heb je er simpelweg de tijd niet voor. Bij Best4u begrijpen we dat. Daarom hebben wij een contentstrateeg in dienst die jou kan helpen bij het schrijven van de juiste teksten voor je website. Heb je hier interesse in? Neem dan <a href="'+domain+'/contact/">contact</a> met ons op voor het ontvangen van een offerte.</p>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
 

        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wptuts', tinymce.plugins.Wptuts );
})();