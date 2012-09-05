# language: es

Característica: Registro de Ponente
  Como visitante
  Yo quiero registrarme como ponente
  Para proponer una conferencia para el evento

  Escenario: Visitante se registra como ponente 
    Dado que estoy en la página de inicio
    Y sigo "Registro de Ponente"
    Cuando relleno "Correo Electrónico" con "bilbo@comarca.com"
    Y relleno "Nombre Completo" con "Bilbo Bolsón"
    Y relleno "Contraseña" con "12345"
    Y relleno "Confirmar contraseña" con "12345"
    Y relleno "Título de la conferencia" con "Historia de una ida y una vuelta"
    Y relleno "Resumen de la conferencia" con "Lorem ipsum...  Lorem ipsum... Lorem ipsum... "
    Y adjunto una presentación a "Anexar presentación"
    Y presiono "Aceptar"
    Entonces debo ver "Usted se ha registrado satisfactoriamente"
    Y debo estar en Registro Exitoso
    Y se envia un correo electrónico con la información del registro
    Y debo ser un usuario registrado

  Escenario: Ponente se registra nuevamente
    Dado que estoy en la página de inicio