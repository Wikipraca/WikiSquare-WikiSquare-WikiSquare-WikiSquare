      
<div id="footer">
<div class="wrap">
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />Este trabalho de <a xmlns:cc="http://creativecommons.org/ns#" href="http://wikipraca.org/" property="cc:attributionName" rel="cc:attributionURL">WikipraçaSP</a>, está licenciado com uma Licença <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons - Atribuição-CompartilhaIgual 4.0 Internacional</a>.
    </div>
</div>
</div>
 <?php wp_footer(); ?>
</body>
<script type="text/javascript">
 var images = ['wikipraca_tags1.png', 'wikipraca_tags2.png', 'wikipraca_tags3.png', 'wikipraca_tags4.png', 'wikipraca_tags5.png', 'wikipraca_tags6.png', 'wikipraca_tags7.png', 'wikipraca_tags8.png'];

var divs = $(".flag_widget");

jQuery.each(divs, function(i,item){ $(item).css({'background-image': 'url(http://wikipraca.org/teste/wp-content/themes/wikitema_home/img/flags/' + images[Math.floor(Math.random() * images.length)] + ')'}); });
</script>
</html>
