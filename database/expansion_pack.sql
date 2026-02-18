-- G U E S S   I T   -   M A S T E R   S E E D
-- ADVERTENCIA: Esto borrará todas las preguntas existentes y las recargará.

-- 1. Desactivar checks de llaves foráneas temporalmente
SET FOREIGN_KEY_CHECKS = 0;

-- 2. Vaciar tablas (Orden inverso para evitar errores)
TRUNCATE TABLE options;
TRUNCATE TABLE questions;

-- 3. Reactivar checks
SET FOREIGN_KEY_CHECKS = 1;

-- 4. INSERTAR LAS 50 PREGUNTAS (Originales + Nuevas)

-- PREGUNTAS ORIGINALES (1-5)
INSERT INTO questions (id, question_text) VALUES 
(1, '¿Cuál es el planeta más grande del sistema solar?'),
(2, '¿Quién pintó la Mona Lisa?'),
(3, '¿En qué año llegó el hombre a la luna?'),
(4, '¿Cuál es el elemento químico con símbolo O?'),
(5, '¿Cuál es la capital de Japón?');

INSERT INTO options (question_id, option_text, is_correct) VALUES 
(1, 'Tierra', 0), (1, 'Marte', 0), (1, 'Júpiter', 1), (1, 'Saturno', 0),
(2, 'Vincent van Gogh', 0), (2, 'Pablo Picasso', 0), (2, 'Leonardo da Vinci', 1), (2, 'Claude Monet', 0),
(3, '1965', 0), (3, '1969', 1), (3, '1975', 0), (3, '1980', 0),
(4, 'Oro', 0), (4, 'Osmio', 0), (4, 'Oxígeno', 1), (4, 'Oliva', 0),
(5, 'Seúl', 0), (5, 'Pekín', 0), (5, 'Tokio', 1), (5, 'Bangkok', 0);

-- NUEVAS PREGUNTAS (6-50)
-- 6. TECNOLOGÍA
INSERT INTO questions (id, question_text) VALUES (6, '¿Qué significa "HTML"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(6, 'HyperText Markup Language', 1), (6, 'HighText Machine Learning', 0), (6, 'HyperTool Multi Level', 0), (6, 'Home Tool Markup Language', 0);

-- 7. CINE
INSERT INTO questions (id, question_text) VALUES (7, '¿Qué película ganó el Oscar a Mejor Película en 1994, perdiendo Pulp Fiction?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(7, 'Forrest Gump', 1), (7, 'Cadena Perpetua', 0), (7, 'El Rey León', 0), (7, 'Speed', 0);

-- 8. CIENCIA
INSERT INTO questions (id, question_text) VALUES (8, '¿Cuál es el hueso más largo del cuerpo humano?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(8, 'Húmero', 0), (8, 'Tibia', 0), (8, 'Fémur', 1), (8, 'Radio', 0);

-- 9. GEOGRAFÍA
INSERT INTO questions (id, question_text) VALUES (9, '¿Cuál es el río más largo del mundo?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(9, 'Nilo', 0), (9, 'Amazonas', 1), (9, 'Yangtsé', 0), (9, 'Misisipi', 0);

-- 10. HISTORIA
INSERT INTO questions (id, question_text) VALUES (10, '¿Quién fue el primer emperador romano?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(10, 'Julio César', 0), (10, 'Nerón', 0), (10, 'Augusto', 1), (10, 'Calígula', 0);

-- 11. VIDEOJUEGOS
INSERT INTO questions (id, question_text) VALUES (11, '¿Cómo se llama el hermano de Mario en Super Mario Bros?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(11, 'Wario', 0), (11, 'Luigi', 1), (11, 'Yoshi', 0), (11, 'Bowser', 0);

-- 12. LITERATURA
INSERT INTO questions (id, question_text) VALUES (12, '¿Quién escribió "Don Quijote de la Mancha"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(12, 'Lope de Vega', 0), (12, 'Miguel de Cervantes', 1), (12, 'Garcilaso de la Vega', 0), (12, 'Quevedo', 0);

-- 13. TECNOLOGÍA
INSERT INTO questions (id, question_text) VALUES (13, '¿Cuál es el sistema operativo móvil más usado del mundo?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(13, 'iOS', 0), (13, 'Android', 1), (13, 'Windows Phone', 0), (13, 'Symbian', 0);

-- 14. ANIMALES
INSERT INTO questions (id, question_text) VALUES (14, '¿Cuál es el animal terrestre más rápido?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(14, 'León', 0), (14, 'Gacela', 0), (14, 'Guepardo', 1), (14, 'Caballo', 0);

-- 15. QUÍMICA
INSERT INTO questions (id, question_text) VALUES (15, '¿Qué elemento químico tiene el símbolo "Au"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(15, 'Plata', 0), (15, 'Cobre', 0), (15, 'Oro', 1), (15, 'Aluminio', 0);

-- 16. ARTE
INSERT INTO questions (id, question_text) VALUES (16, '¿Quién pintó "La noche estrellada"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(16, 'Vincent van Gogh', 1), (16, 'Salvador Dalí', 0), (16, 'Pablo Picasso', 0), (16, 'Rembrandt', 0);

-- 17. DEPORTES
INSERT INTO questions (id, question_text) VALUES (17, '¿En qué deporte se destaca Michael Phelps?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(17, 'Atletismo', 0), (17, 'Natación', 1), (17, 'Baloncesto', 0), (17, 'Tenis', 0);

-- 18. MÚSICA
INSERT INTO questions (id, question_text) VALUES (18, '¿Quién es conocido como el Rey del Pop?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(18, 'Elvis Presley', 0), (18, 'Freddie Mercury', 0), (18, 'Michael Jackson', 1), (18, 'Prince', 0);

-- 19. TECNOLOGÍA
INSERT INTO questions (id, question_text) VALUES (19, '¿Qué compañía fundó Bill Gates?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(19, 'Apple', 0), (19, 'Microsoft', 1), (19, 'IBM', 0), (19, 'Amazon', 0);

-- 20. GEOGRAFÍA
INSERT INTO questions (id, question_text) VALUES (20, '¿Cuál es la capital de Australia?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(20, 'Sídney', 0), (20, 'Melbourne', 0), (20, 'Canberra', 1), (20, 'Brisbane', 0);

-- 21. CINE
INSERT INTO questions (id, question_text) VALUES (21, '¿En qué año se estrenó la primera película de Star Wars?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(21, '1975', 0), (21, '1977', 1), (21, '1980', 0), (21, '1983', 0);

-- 22. COMIDA
INSERT INTO questions (id, question_text) VALUES (22, '¿De qué país es originario el Sushi?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(22, 'China', 0), (22, 'Tailandia', 0), (22, 'Japón', 1), (22, 'Corea', 0);

-- 23. MATEMÁTICAS
INSERT INTO questions (id, question_text) VALUES (23, '¿Cuánto es la raíz cuadrada de 144?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(23, '10', 0), (23, '11', 0), (23, '12', 1), (23, '14', 0);

-- 24. ASTRONOMÍA
INSERT INTO questions (id, question_text) VALUES (24, '¿Cuál es el planeta más cercano al Sol?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(24, 'Venus', 0), (24, 'Marte', 0), (24, 'Mercurio', 1), (24, 'Tierra', 0);

-- 25. HISTORIA
INSERT INTO questions (id, question_text) VALUES (25, '¿En qué año cayó el Muro de Berlín?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(25, '1987', 0), (25, '1989', 1), (25, '1991', 0), (25, '1993', 0);

-- 26. CÓMICS
INSERT INTO questions (id, question_text) VALUES (26, '¿Cuál es la identidad secreta de Batman?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(26, 'Clark Kent', 0), (26, 'Peter Parker', 0), (26, 'Bruce Wayne', 1), (26, 'Tony Stark', 0);

-- 27. PROGRAMACIÓN
INSERT INTO questions (id, question_text) VALUES (27, '¿Qué lenguaje se usa principalmente para estilos web?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(27, 'HTML', 0), (27, 'PHP', 0), (27, 'CSS', 1), (27, 'Java', 0);

-- 28. IDIOMAS
INSERT INTO questions (id, question_text) VALUES (28, '¿Cuál es el idioma más hablado del mundo (nativos)?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(28, 'Inglés', 0), (28, 'Español', 0), (28, 'Chino Mandarín', 1), (28, 'Hindi', 0);

-- 29. BIOLOGÍA
INSERT INTO questions (id, question_text) VALUES (29, '¿Qué órgano del cuerpo humano produce insulina?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(29, 'Hígado', 0), (29, 'Riñón', 0), (29, 'Páncreas', 1), (29, 'Corazón', 0);

-- 30. FÍSICA
INSERT INTO questions (id, question_text) VALUES (30, '¿Quién formuló la teoría de la relatividad?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(30, 'Isaac Newton', 0), (30, 'Nikola Tesla', 0), (30, 'Albert Einstein', 1), (30, 'Galileo Galilei', 0);

-- 31. DIBUJOS ANIMADOS
INSERT INTO questions (id, question_text) VALUES (31, '¿Quién vive en una piña debajo del mar?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(31, 'Patricio Estrella', 0), (31, 'Bob Esponja', 1), (31, 'Calamardo', 0), (31, 'Arenita', 0);

-- 32. MONEDA
INSERT INTO questions (id, question_text) VALUES (32, '¿Cuál es la moneda oficial del Reino Unido?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(32, 'Euro', 0), (32, 'Dólar', 0), (32, 'Libra Esterlina', 1), (32, 'Franco', 0);

-- 33. MITOLOGÍA
INSERT INTO questions (id, question_text) VALUES (33, '¿Quién es el dios del trueno en la mitología nórdica?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(33, 'Odín', 0), (33, 'Loki', 0), (33, 'Thor', 1), (33, 'Zeus', 0);

-- 34. TECNOLOGÍA
INSERT INTO questions (id, question_text) VALUES (34, '¿Qué significan las siglas "CPU"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(34, 'Central Processing Unit', 1), (34, 'Computer Personal Unit', 0), (34, 'Central Power Unit', 0), (34, 'Computer Power User', 0);

-- 35. SERIES
INSERT INTO questions (id, question_text) VALUES (35, '¿En "Juego de Tronos", cuál es el lema de la casa Stark?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(35, 'Fuego y Sangre', 0), (35, 'Se acerca el Invierno', 1), (35, 'Nuestra es la Furia', 0), (35, 'Oye mi Rugido', 0);

-- 36. VIDEOJUEGOS
INSERT INTO questions (id, question_text) VALUES (36, '¿Qué compañía creó la PlayStation?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(36, 'Nintendo', 0), (36, 'Sega', 0), (36, 'Sony', 1), (36, 'Microsoft', 0);

-- 37. CIUDADES
INSERT INTO questions (id, question_text) VALUES (37, '¿Dónde se encuentra la Torre Eiffel?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(37, 'Roma', 0), (37, 'Londres', 0), (37, 'París', 1), (37, 'Berlín', 0);

-- 38. CUERPO HUMANO
INSERT INTO questions (id, question_text) VALUES (38, '¿Cuántos dientes tiene un adulto promedio?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(38, '28', 0), (38, '30', 0), (38, '32', 1), (38, '34', 0);

-- 39. INVENTOS
INSERT INTO questions (id, question_text) VALUES (39, '¿Quién inventó la bombilla eléctrica comercial?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(39, 'Graham Bell', 0), (39, 'Thomas Edison', 1), (39, 'Nikola Tesla', 0), (39, 'Benjamin Franklin', 0);

-- 40. INTERNET
INSERT INTO questions (id, question_text) VALUES (40, '¿Qué red social compró Elon Musk en 2022?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(40, 'Facebook', 0), (40, 'Instagram', 0), (40, 'Twitter', 1), (40, 'TikTok', 0);

-- 41. COCHES
INSERT INTO questions (id, question_text) VALUES (41, '¿A qué grupo pertenece la marca Ferrari?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(41, 'Volkswagen', 0), (41, 'BMW', 0), (41, 'Stellantis (Ex-Fiat)', 1), (41, 'Toyota', 0);

-- 42. ESPACIO
INSERT INTO questions (id, question_text) VALUES (42, '¿Cómo se llama nuestra galaxia?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(42, 'Andrómeda', 0), (42, 'Vía Láctea', 1), (42, 'Triángulo', 0), (42, 'Centauri', 0);

-- 43. QUÍMICA
INSERT INTO questions (id, question_text) VALUES (43, '¿Cuál es la fórmula del agua?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(43, 'HO2', 0), (43, 'H2O', 1), (43, 'CO2', 0), (43, 'H2O2', 0);

-- 44. CINE
INSERT INTO questions (id, question_text) VALUES (44, '¿Qué actor interpreta a Iron Man en el UCM?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(44, 'Chris Evans', 0), (44, 'Chris Hemsworth', 0), (44, 'Robert Downey Jr.', 1), (44, 'Mark Ruffalo', 0);

-- 45. HISTORIA
INSERT INTO questions (id, question_text) VALUES (45, '¿En qué año comenzó la Segunda Guerra Mundial?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(45, '1914', 0), (45, '1936', 0), (45, '1939', 1), (45, '1945', 0);

-- 46. TECNOLOGÍA
INSERT INTO questions (id, question_text) VALUES (46, '¿Qué es "Python" en informática?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(46, 'Una serpiente', 0), (46, 'Un virus', 0), (46, 'Un lenguaje de programación', 1), (46, 'Un navegador web', 0);

-- 47. GEOGRAFÍA
INSERT INTO questions (id, question_text) VALUES (47, '¿Cuál es el país más grande del mundo por superficie?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(47, 'China', 0), (47, 'Estados Unidos', 0), (47, 'Rusia', 1), (47, 'Canadá', 0);

-- 48. ANATOMÍA
INSERT INTO questions (id, question_text) VALUES (48, '¿Cuántos corazones tiene un pulpo?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(48, 'Uno', 0), (48, 'Dos', 0), (48, 'Tres', 1), (48, 'Ninguno', 0);

-- 49. MÚSICA
INSERT INTO questions (id, question_text) VALUES (49, '¿Qué banda británica lanzó el álbum "Abbey Road"?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(49, 'Rolling Stones', 0), (49, 'Queen', 0), (49, 'The Beatles', 1), (49, 'Pink Floyd', 0);

-- 50. CULTURA GENERAL
INSERT INTO questions (id, question_text) VALUES (50, '¿Cuál es el color de la caja negra de los aviones?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(50, 'Negro', 0), (50, 'Naranja', 1), (50, 'Rojo', 0), (50, 'Blanco', 0);
