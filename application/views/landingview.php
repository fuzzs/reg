<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script>
    $(function() {
        var availableCountries = [
            {label: "Canada", value: "ca", region: "Province"},
            {label: "United States of America", value: "us", region: "State"},
            {label: "France", value: "fr", region: "Département"},
            {label: "United Kingdom", value: "uk", region: "State"}
        ];
        
        var caRegions = [
            {label: "Alberta", value: "ab"},
            {label: "British-Colombia", value: "bc"},
            {label: "Québec", value: "qc"}
        ];
        
        $( "#Countries" ).autocomplete({
            minLength: 0,
            source: availableCountries,
            focus: function(event, ui){
                $("#Countries").val(ui.item.label);
                return false;
            },
            select: function(event, ui){
                $("#Countries").val(ui.item.label);
                $("#RegionName").text(ui.item.region);
                $("#Regions").autocomplete( "option", "source", caRegions);
                return false;
            }
        });
        
        $("#Regions").autocomplete({
            focus: function(event, ui){
                 $("#Regions").val(ui.item.label);
                 return false;
            },
            select: function(event, ui){
                 $("#Regions").val(ui.item.label);
                 return false;
            }
        });
    });
</script>

<div class="landingFrame">
    <?= $loginForm; ?>
</div>





<a href="index.php/Article/">Article</a>

<?= $test ?>

<div id="debug">
    
</div>