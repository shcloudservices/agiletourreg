# language: es
Característica: Registro de Participante
  Como Visitante
  Yo quiero registrarme como Participante
  Para asistir al evento

#  Antecedentes:
#    [Dado|Dada|Dados|Dadas] there is agent A
#    Y there is agent B

  Escenario: Registro exitoso de un Visitante como Participante
    Dado estoy en la página de inicio
    Y sigo "Registro de Participante"
    Cuando relleno "Correo Electrónico" con "frodo@shire.com"
    Y relleno "Nombre Completo" con "Frodo Bolsón"
    Y relleno "Contraseña" con "12345"
    Y relleno "Confirmar contraseña" con "12345"
    Y selecciono "BOD" de "Banco"
    Y selecciono "Depósito" de "Tipo de Transacción"
    #O selecciono "Transferencia" de "Tipo de Transacción"
    Y relleno "Número de Transacción" con "0123456789"
    Y presiono "Aceptar"
    Entonces debo ver "Usted se ha registrado satisfactoriamente"
    Y debo estar en "registro/registroexitoso"
    #Y debo recibir un correo electrónico con la información de mi registro

#  Escenario: Registro fallido de un Visitante como Participante cuando introduce el campo "Correo Electrónico" incorrecto.
#    Dado estoy en la página de inicio
#    Y sigo "Registro de Participante"
#    Cuando relleno "Correo Electrónico" con "sauron.com"
#    Y relleno "Nombre Completo" con "Frodo Bolsón"
#    Y relleno "Contraseña" con "12345"
#    Y relleno "Confirmar contraseña" con "12345"
#    Y selecciono "BOD" de "Banco"
#    Y selecciono "Depósito" de "Tipo de Transacción"
#    #O selecciono "Transferencia" de "Tipo de Transacción"
#    Y relleno "Número de Transacción" con "0123456789"
#    Y presiono "Aceptar"
#    Entonces debo ver "Datos incorrectos, por favor verifique"
#    Y debo estar en "registro"
#    #Y debería ver el campo "Correo Electrónico" marcado como erróneo.

#  Escenario: Participante se registra nuevamente
#    Dado estoy en la página de inicio
#    Y sigo "Registro de Participante"
#    #Y existe un usuario registrado con Correo Electrónico "frodo@shire.com"
#    Cuando relleno "Correo Electrónico" con "frodo@shire.com"
#    Y relleno "Nombre Completo" con "Frodo Bolsón"
#    Y relleno "Contraseña" con "12345"
#    Y relleno "Confirmar contraseña" con "12345"
#    Y selecciono "BOD" de "Banco"
#    Y selecciono "Depósito" de "Tipo de Transacción"
#    #O selecciono "Transferencia" de "Tipo de Transacción"
#    Y relleno "Número de Transacción" con "0123456789"
#    Y presiono "Aceptar"
#    Entonces debo ver "Usted se encuentra registrado"
#    Y debo estar en "registro"
