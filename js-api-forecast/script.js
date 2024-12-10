const apiKey = 'bd5eff4885c34e888b352806240710'; // Ваш API ключ
const city = 'yalta'; // Город для прогноза
const days = 7; // Количество дней для прогноза

async function getWeather() {
    try {
        const response = await fetch(`https://api.weatherapi.com/v1/forecast.json?key=${apiKey}&q=${city}&days=${days}`);
        
        if (!response.ok) {
            throw new Error('Ошибка при получении данных');
        }

        const data = await response.json();
        displayWeather(data);
    } catch (error) {
        console.error('Ошибка:', error);
        document.getElementById('weather').innerHTML = `<div class="alert alert-danger" role="alert">Не удалось загрузить данные о погоде.</div>`;
    }
}

function displayWeather(data) {
    const forecastDays = data.forecast.forecastday;
    let weatherHtml = '<div class="row">';

    forecastDays.forEach(day => {
        weatherHtml += 
            `<div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${new Date(day.date).toLocaleDateString('ru-RU', { weekday: 'long' })}</h5>
                        <p class="card-text"><strong>Температура:</strong> ${day.day.avgtemp_c} °C</p>
                        <p class="card-text"><strong>Состояние:</strong> ${day.day.condition.text}</p>
                        <img src="https://${day.day.condition.icon}" alt="${day.day.condition.text}" class="img-fluid">
                        <hr>
                        <p><strong>Макс. температура:</strong> ${day.day.maxtemp_c} °C</p>
                        <p><strong>Мин. температура:</strong> ${day.day.mintemp_c} °C</p>
                        <p><strong>Влажность:</strong> ${day.day.avghumidity}%</p>
                        <p><strong>Скорость ветра:</strong> ${day.day.maxwind_kph} км/ч</p>
                    </div>
                </div>
            </div>`;
    });

    weatherHtml += `</div>`;
    document.getElementById('weather').innerHTML = weatherHtml;
}

// Запуск функции получения погоды
getWeather();
