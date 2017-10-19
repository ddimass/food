jQuery('body').on('click','#plus', function(){
jQuery.ajax({
'type': 'GET',
'url': '$(this).attr("href")',
'update':'#order-calc', 
})
return false;
});