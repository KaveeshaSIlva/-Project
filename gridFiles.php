<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="jquery-ui.css">
  
 
  <style>
  #feedback { font-size: 1.4em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #selectable li { margin: 4px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 4em; text-align: center; }
  #selectable .available { background: rgb(96, 241, 38); color: rgb(14, 13, 13); }
  #selectable .occupied {background: red; color: rgb(14, 13, 13);}
  #selectable .consulted {background: purple; color: rgb(14, 13, 13);}
  </style>
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  var channel;
  $(document).ready( function() {
    $( "#selectable" ).selectable({
        filter: "li.available",
        selected: function(){
          // $(ui.selected).addClass('ui-selected').siblings().removeClass('ui-selected');
          $(".ui-selected",this).each(function(){
            channel = $(this).text();
          });
          alert(channel);// take input from here
        }
        });
  } );
// var cancelChannel;
// $(document).ready( function() {
//     $( "#selectable" ).selectable({
//         filter: "li.occupied",
//         selected: function(){
//           //$(ui.selected).addClass('ui-selected').siblings().removeClass('ui-selected');
//           $(".ui-selected",this).each(function(){
//             channel = $(this).text();
//           });
//           alert(channel);// take input from here
//         }
//         });
//   } );

</script>
  </head>

  <body>
  <script>
       
       function Grid_genarator(num,a,o,c) {
         for(i=1; i<=num; i++){
           var list = document.createElement("LI");
           var text = document.createTextNode(i);
           list.appendChild(text);
           if(a.includes(i)){
             list.setAttribute('class','available');
           }
           else if(o.includes(i)){
             list.setAttribute('class','occupied');
           }
           else if(c.includes(i)){
             list.setAttribute('class','consulted');
           }
           // else{
           //   list.setAttribute('class','ui-state-default');
           // }
          
           document.getElementById("selectable").appendChild(list);
         }
       }

   </script>

  </body>
