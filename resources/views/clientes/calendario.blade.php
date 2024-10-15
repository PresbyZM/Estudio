@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    /* Estilos de la segunda versión */
    .container {
        text-align: center;
        margin: auto;
        width: 80%;
    }
    .calendar-title {
        font-size: 24px;
        margin-bottom: 20px;
    }
    .calendar {
        display: inline-block;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin-bottom: 20px;
    }
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .calendar-month {
        font-size: 20px;
        font-weight: bold;
    }
    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    .calendar-day {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .calendar-day:hover {
        background-color: #f0f0f0;
        cursor: pointer;
    }
    .occupied {
        background-color: #d0e6f9;
    }
    .btn-hover {
        cursor: pointer;
    }
    .event-icon {
        width: 16px;
        height: 16px;
    }
</style>

<div class="container animate__animated animate__fadeIn">
    <h2 class="calendar-title">Calendario de Eventos</h2>
    <div class="calendar">
        <div class="calendar-header">
            <button id="prevMonth" class="btn btn-primary btn-hover">‹</button>
            <span class="calendar-month" id="calendarMonthYear"></span>
            <button id="nextMonth" class="btn btn-primary btn-hover">›</button>
        </div>
        <div id="calendarBody" class="calendar-body"></div>
    </div>
</div>

<script>
    // Variables y eventos ocupados
    const fechasEventos = @json($fechasEventos); // Formato ["2023-11-10", "2023-12-25", etc.]
    
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const days = [];

        for (let i = 1; i <= lastDay.getDate(); i++) {
            days.push(i);
        }

        const calendarBody = document.getElementById('calendarBody');
        document.getElementById('calendarMonthYear').innerText = `${firstDay.toLocaleString('es-ES', { month: 'long' })} ${year}`;
        calendarBody.innerHTML = `<div class="calendar-days">${days.map(day => {
            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const isOccupied = fechasEventos.includes(dateStr);
            return `<div class="calendar-day ${isOccupied ? 'occupied' : ''}" ${!isOccupied ? `onclick="openPeticionForm('${dateStr}')"` : ''}>
                        ${day}
                        ${isOccupied ? `<img src="{{ asset('images/camara.png') }}" class="event-icon" alt="Evento">` : ''}
                    </div>`;
        }).join('')}</div>`;
    }

    function openPeticionForm(fecha) {
        window.location.href = `/peticiones/create?dia_evento_peticion=${fecha}`;
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
        currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });

    renderCalendar(currentMonth, currentYear);
</script>

@endsection
