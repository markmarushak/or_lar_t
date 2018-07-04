// $(document).ready(function(){
//     var search = location.search.substr(1)
//         .split('&')
//         .reduce(function (res, a) {
//             var t = a.split('=');
//
//             res[decodeURIComponent(t[0])] = t.length == 1 ? null : decodeURIComponent(t[1]);
//             return res;
//         }, {});
//
//     if(search.type == 'All'){
//         $('#type_chose').removeAttr("hidden");
//     }
//     else{
//         $('#n_type').val(search.type);
//     }
// })