require('./bootstrap');
const $ = require('jquery');
const Handlebars = require('handlebars');

$(document).ready(function(){
  //alert('ciao');
  $('#filter-button').click(function(){
    var name = $('#name').val();
    var company = $('#company').val();
    var role = $('#role').val();
    var age = $('#age').val();
    var gender = $('#gender').val();
    
    // var arrayData = [
    //   name,
    //   company,
    //   role,
    //   age,
    //   gender,
    // ];

    var data = {
      'name': name,
      'company': company,
      'role': role,
      'age': age,
      'gender': gender
    };

    for (var key in data) {
      if (data[key].length == 0) {
        delete data[key];
      }
    }

    // for (var i = data.length - 1; i >= 0; i--) {
    //   console.log(i);
      
    //   if (data[i].length == 0) {
    //     // data.splice(i, 1);
    //     delete data[i];
    //   }
    // }
    console.log(data);
    
    $.ajax(
      {
        'url': 'http://127.0.0.1:8000/api/students/filter',
        'method': 'POST',
        'data': data,
        'success': function(data){
          console.log('data',data);

          $('.students').html('');
          
          var source = $("#entry-template").html();
          var template = Handlebars.compile(source);
          for (var i = 0; i < data.length; i++) {
            var element = data[i];
            element.key = i;
            var html = template(element);
            $('.students').append(html);
          }
          
        },
        'error': function() {
          console.log('error');
          
        }
      }
    );
    
  });
});

function isSet(value) {
  if(value.length > 0) {
    return value;
  }
}