$(() => {
  if (window.location.search.includes('response=success')) {
    let result = ''
    result += '<div class="alert alert-success alert-dismissible" role="alert">';
    result += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    result += 'Gracias por tu interes en nuestros servicios, permitenos darle algo de tiempo a tu solicitud';
    result += '</div>';
    $('#contactFormResponse').html(result)
  }
})