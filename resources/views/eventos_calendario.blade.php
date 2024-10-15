@extends('layouts.base')
<link rel="icon" href="{{ asset('images/camara.png') }}">
<br>
<br>
<br>
@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="container animate__animated animate__fadeIn">
    <h2 class="calendar-title">Calendario de Eventos</h2>
    <div class="calendar">
        <div class="calendar-header">
            <button id="prevMonth" class="btn btn-primary btn-hover">‹</button>
            <span class="calendar-month" id="calendarMonthYear"></span>
            <button id="nextMonth" class="btn btn-primary btn-hover">›</button>
            <a href="{{ route('eventos.index') }}" class="nav-link calendar-events-link" onclick="showLoader()">
                <i class="bx bx-calendar icon"></i>
                <span class="link">Eventos</span>
            </a>
        </div>
        <div id="calendarBody" class="calendar-body"></div>
    </div>
</div>

<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Detalles del Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="eventModalBody">
                
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendarBody');
        const calendarMonthYear = document.getElementById('calendarMonthYear');
        const events = @json($events); 
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        function createCalendar(month, year) {
            let firstDay = new Date(year, month, 1);
            let lastDay = new Date(year, month + 1, 0);

            let days = [];
            for (let i = 1; i <= lastDay.getDate(); i++) {
                days.push(i);
            }

        
            calendarMonthYear.innerText = `${firstDay.toLocaleString('es-ES', { month: 'long' })} ${year}`;

            
            let html = `<div class="calendar-days">
                            ${days.map(day => {
                                let dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                                let dayEvents = events.filter(e => e.start === dateStr);
                                return `<div class="calendar-day" data-date="${dateStr}" ${dayEvents.length > 0 ? 'style="background-color: #d0e6f9;"' : ''}>
                                            ${day}
                                            ${dayEvents.length > 0 ? `<div class="event-icon"><img src="{{ asset('images/camara.png') }}" alt="Camera"></div>` : ''}
                                        </div>`;
                            }).join('')}
                        </div>`;

            calendarEl.innerHTML = html;

            
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.addEventListener('click', function() {
                    let date = this.getAttribute('data-date');
                    let dayEvents = events.filter(e => e.start === date);

                    if (dayEvents.length > 0) {
                        let eventHtml = dayEvents.map(event => `
                            <div class="event-detail">
                                <p><strong>Nombre:</strong> ${event.title}</p>
                                <p><strong>Descripción:</strong> ${event.description}</p>
                                <p><strong>Cliente:</strong> ${event.client_name}</p>
                                <p><strong>Teléfono:</strong> ${event.client_phone}</p>
                                <p><strong>Precio:</strong> ${event.price}</p>
                                <p><strong>Anticipo:</strong> ${event.anticipo}</p>
                                <p><strong>Resto:</strong> ${event.resto}</p>
                                <hr>
                            </div>
                        `).join('');

                        document.getElementById('eventModalBody').innerHTML = eventHtml;

                        var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                        eventModal.show();
                    }
                });
            });
        }

        document.getElementById('prevMonth').addEventListener('click', function() {
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
            createCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
            currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
            createCalendar(currentMonth, currentYear);
        });

        createCalendar(currentMonth, currentYear);
    });
</script>

@endsection
