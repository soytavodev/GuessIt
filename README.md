# 🧠 GuessIt - Trivia Challenge

![Project Status](https://img.shields.io/badge/Status-Live%20&%20Playable-success?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.2-777bb4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479a1?style=for-the-badge&logo=mysql)
![CSS3](https://img.shields.io/badge/Style-Clash%20Theme-ffca28?style=for-the-badge&logo=css3)

> **[🎮 JUGAR AHORA (LIVE DEMO)](https://guessit.gamer.gd/index.php)**
> *¡Regístrate y compite por el primer lugar en el ranking global!*

---

## 📋 Descripción

**GuessIt** es una aplicación web dinámica de trivia desarrollada desde cero para demostrar el dominio de **PHP Nativo** y **SQL** sin depender de frameworks.

El objetivo técnico fue construir una arquitectura escalable, segura y modular, implementando un sistema de usuarios completo, lógica de juego basada en sesiones y un diseño visual de alto impacto ("Clash Theme") utilizando únicamente CSS3 moderno.

## 🚀 Características Principales

### 🔒 Backend & Seguridad
* **Auth System:** Registro y Login completos con hash de contraseñas (`password_hash` / `bcrypt`).
* **State Management:** Lógica de juego persistente mediante Sesiones PHP, previniendo la pérdida de datos al recargar.
* **Security First:** Protección contra Inyección SQL mediante **PDO Prepared Statements** y sanitización de inputs (XSS).
* **Error Handling:** Sistema de manejo de errores silencioso en producción para evitar fugas de información sensible.

### 💾 Base de Datos (MySQL)
* **Modelo Relacional:** Esquema normalizado con tablas para Usuarios, Preguntas, Opciones y Partidas.
* **Data Seeding:** Script de inicialización con +50 preguntas aleatorias de diversas categorías (Ciencia, Historia, Tech, Cine).
* **Advanced Queries:** Ranking global generado mediante consultas complejas (`JOIN`, `GROUP BY`, `MAX`, `ORDER BY`).

### 🎨 Frontend (Clash Theme UI)
* **CSS Puro:** Sin Bootstrap ni Tailwind. Todo el estilo fue escrito a mano.
* **Diseño Skeuomórfico:** Botones 3D, sombras profundas, bordes "texturizados" y tipografía *Titan One*.
* **Responsive:** Diseño adaptable a móviles y escritorio mediante Flexbox y CSS Grid.

---

## 📸 Galería

| Inicio & Login | Gameplay | Ranking Global |
|:---:|:---:|:---:|
| ![Inicio](assets/img/home.png) | ![Juego](assets/img/game.png) | ![Ranking](assets/img/ranking.png) |

---

## 🛠️ Stack Tecnológico

* **Lenguaje:** PHP 8+ (Estilo Procedural/MVC Manual).
* **Base de Datos:** MySQL / MariaDB.
* **Frontend:** HTML5 Semántico, CSS3 (Variables, Gradients, Transformations).
* **Entorno:** XAMPP (Local) / LAMP Stack (Producción en InfinityFree).
* **Control de Versiones:** Git & GitHub.

## 📂 Estructura del Proyecto

El proyecto sigue una estructura limpia para facilitar la mantenibilidad:

```text
GuessIt/
├── assets/          # CSS, JS, Imágenes y Fuentes
├── config/          # Conexión a BD (Ignorado en git por seguridad)
├── database/        # Scripts SQL (Schema y Seeds)
├── includes/        # Lógica reutilizable (Auth, Funciones)
├── templates/       # Componentes visuales (Header, Footer)
├── index.php        # Controlador principal
└── ...              # Archivos de vistas y lógica (login, play, result)
```

## 📦 Instalación Local
Si deseas correr este proyecto en tu máquina:

1. Clonar el repositorio:
git clone [https://github.com/soytavodev/GuessIt.git](https://github.com/soytavodev/GuessIt.git)

2. Configurar Base de Datos:
Crea una BD llamada guessit_db en tu gestor MySQL.
Importa el archivo database/schema.sql.
Ejecuta el script database/seeds.sql para cargar las preguntas.

3. Conexión:
Crea un archivo config/db.php basado en el entorno.
Define tus credenciales ($host, $user, $pass, $dbname).

4. Ejecutar:
Abre el proyecto en tu servidor local (ej: localhost/GuessIt).

---

Desarrollado por Gustavo Delnardo.
