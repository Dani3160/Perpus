var h=(new Date()).getHours();
var m=(new Date()).getMinutes();
var s=(new Date()).getSeconds();
 
if (h > 3 && h <  12) document.writeln("Pagi,");
 
if (h > 11 && h <  18) document.writeln("Siang,");
 
if (h > 17 && h <  24) document. writeln("Malam,");
 
if (h > 23 || h <  4 ) document. writeln("Dini Hari,");