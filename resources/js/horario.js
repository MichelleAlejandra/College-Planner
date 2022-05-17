const { defaultsDeep } = require("lodash");

document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('horario');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      locale: "es",
      hiddenDays: [ 0 ],

      headerToolbar:{
        //left: 'prev,next today',
        left: '',
        center:   '',
        //right: 'dayGridMonth,timeGridWeek,listWeek'
        right: '',
      },

      dayHeaderFormat:{ weekday: 'long' },

      dateClick:function(info){

        $("#agregarMateria").modal("show");
        dd('Llegas')
      },



    });

    calendar.render();
  });
