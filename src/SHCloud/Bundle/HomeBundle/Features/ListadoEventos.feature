# language: es
Característica: Listado de Eventos

El listado de eventos muestra los eventos disponibles y provee enlaces al registro como participante o ponente.

Como Visitante
Yo quiero ver una lista de los eventos
Para tener acceso al registro

Escenario: Lista de eventos
  Dado que existen los eventos:
    | id | Ciudad  | Fecha      |
    | 1  | Caracas | 08-11-2012 |
    | 2  | Mérida  | 10-11-2012 |
  Cuando estoy en la página de inicio
  Entonces debo ver el evento "Caracas" con fecha "8 de Noviembre de 2012"
  Y debo ver el evento "Mérida" con fecha "10 de Noviembre de 2012"
  Y ambos eventos deben tener enlaces para registrarse como participante y ponente