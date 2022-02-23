<template>
    <FullCalendar :options="calendarOptions" />
</template>

<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'
import frLocale from "@fullcalendar/core/locales/fr";

export default {

    data(){
        return {
        calendarOptions: {
            plugins: [ dayGridPlugin, interactionPlugin, timeGridPlugin ],
            initialView: 'dayGridMonth',
            dateClick: this.handleDateClick,
            locale: frLocale,
            headerToolbar: {
                left: 'prev, next, today',
                center: 'title',
                right: 'dayGridMonth, timeGridWeek, timeGridDay'
            },
            height: "auto"
        }
    }
  },

  methods: {
    handleDateClick: function(arg) {
      this.$emit('dateClick', arg)
    }
  },

  components: {
      
    FullCalendar
  }
}
</script>