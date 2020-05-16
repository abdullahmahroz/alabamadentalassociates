// JavaScript Document
$ult = jQuery.noConflict();

$ult(".ultimate-spacing").each(function(index, element) {
	var t = $ult(element);
    get_values_from_hidden_field(t);
    set_values_from_hidden_field(t);
});

function get_values_from_hidden_field(t) {
    var mv = t.find(".ultimate-spacing-value").val();

    if (mv != "") {
    var vals = mv.split(";");
      $ult.each(vals, function(i, vl) {
          if (vl != "") {
              t.find(".ultimate-spacing-inputs").each(function(input_index, elem) {
                var splitval = vl.split(":");
                var dataid = $ult(elem).attr("data-id");
                
                if( dataid==splitval[0] ) {
                  var unit = $ult(elem).attr("data-unit");
                  mval = splitval[1].split(unit);
                  $ult(elem).val(mval[0]);
                }
             });
          }
      });

    } else {
      t.find(".ultimate-spacing-inputs").each(function(input_index, elem) {
        var d = $ult(elem).attr("data-default");
        $ult(elem).val(d);
      });
    }
}

/*
 *		Set Values
 *
 *	Set hidden field values
 */
//	On change - input / select
$ult(".ultimate-spacing-input").on('change', function(e){
	var t = $ult(this).closest('.ultimate-spacing');
	set_values_from_hidden_field(t);
});

function set_values_from_hidden_field(t) {
  var nval = "";

  //  add all spacing widths, margins, paddings 
  t.find(".ultimate-spacing-inputs").each(function(index, elm) {
    var unit = t.find(".ultimate-spacing-value").attr("data-unit");

    var ival = $ult(elm).val();
    if ($ult.isNumeric(ival)) {
        if (ival.match(/^[0-9]+$/))
            var item = $ult(elm).attr("data-id") + ":" + $ult(elm).val() + unit + ";";
        nval += item;
    }
  });
  t.find(".ultimate-spacing-value").val(nval);
}