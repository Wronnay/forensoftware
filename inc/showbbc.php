  <script type="text/javascript">
  /* <![CDATA[ */

  var idTextfeld    = 'nachricht';
  var idColorpicker = 'colorpicker';

  var rangeIE = null;

  function insertProperty(prop,val)
  {
    insertText('[' + prop + '=' + val + ']', '[\/' + prop + ']');
  }


  function insertText(vor, nach)
  {
     var textfeld = document.getElementById(idTextfeld);
     textfeld.focus();                                      

     if(typeof document.selection != 'undefined')           
     {
       insertIE(textfeld, vor, nach);
     }
     else if (typeof textfeld.selectionStart != 'undefined') 
     {
       insertGecko(textfeld, vor, nach);
     }
  }

  function insertIE(textfeld, vor, nach)
  {
     if(!rangeIE) rangeIE = document.selection.createRange();

     if(rangeIE.parentElement().id != idTextfeld) { rangeIE = null; return; }

     var alterText = rangeIE.text;

     rangeIE.text = vor + alterText + nach;

     if (alterText.length == 0)
       rangeIE.move('character', -nach.length);
     else
       rangeIE.moveStart('character', rangeIE.text.length);
    
     rangeIE.select();
     rangeIE = null;
  }

  function insertGecko(textfeld, vor, nach)
  {
     von = textfeld.selectionStart;
     bis = textfeld.selectionEnd;

     anfang = textfeld.value.slice(0,   von);
     mitte  = textfeld.value.slice(von, bis);
     ende   = textfeld.value.slice(bis);   

     textfeld.value = anfang + vor + mitte + nach + ende;

     if(bis - von == 0)
     {
       textfeld.selectionStart = von + vor.length;
       textfeld.selectionEnd   = textfeld.selectionStart;
     }
     else
     {
       textfeld.selectionEnd   = bis + vor.length + nach.length;
       textfeld.selectionStart = textfeld.selectionEnd;
     }
  };

  function getSelectionIE()
  {
    if (document.selection)
    {
      document.getElementById(idTextfeld).focus();
      rangeIE = document.selection.createRange();
    }
  }

  function generateColorTable(idContainer)
  {
    if(document.getElementById(idColorpicker))
    {
      document.getElementById(idContainer).innerHTML = ''; return;
    }

    var strTabelle = '<table id="'+idColorpicker+'" cellspacing="0">'+"\n";

    for(var r=0; r<257; r+=64)
    {
      strTabelle += "<tr>\n";

      for(var g=0; g<257; g+=64)
        for(var b=0; b<257; b+=64)
           strTabelle += '<td style="background:rgb('+r+','+g+','+b+')" '
                         + 'onclick="pickBgColor(this)" '
                         + 'onmousedown="getSelectionIE()"><\/td>'+"\n";

      strTabelle += "<\/tr>\n";
    }

    strTabelle += "<\/table>\n";

    document.getElementById(idContainer).innerHTML += strTabelle;
  }

  function pickBgColor(elem)
  {
    insertProperty('color', elem.style.backgroundColor);
  }
  
  /* ]]> */
  </script>
