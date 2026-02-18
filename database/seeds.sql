-- Insertar preguntas y opciones de ejemplo
-- Pregunta 1
INSERT INTO questions (id, question_text) VALUES (1, '¿Cuál es el planeta más grande del sistema solar?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(1, 'Tierra', 0),
(1, 'Marte', 0),
(1, 'Júpiter', 1),
(1, 'Saturno', 0);

-- Pregunta 2
INSERT INTO questions (id, question_text) VALUES (2, '¿Quién pintó la Mona Lisa?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(2, 'Vincent van Gogh', 0),
(2, 'Pablo Picasso', 0),
(2, 'Leonardo da Vinci', 1),
(2, 'Claude Monet', 0);

-- Pregunta 3
INSERT INTO questions (id, question_text) VALUES (3, '¿En qué año llegó el hombre a la luna?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(3, '1965', 0),
(3, '1969', 1),
(3, '1975', 0),
(3, '1980', 0);

-- Pregunta 4
INSERT INTO questions (id, question_text) VALUES (4, '¿Cuál es el elemento químico con símbolo O?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(4, 'Oro', 0),
(4, 'Osmio', 0),
(4, 'Oxígeno', 1),
(4, 'Oliva', 0);

-- Pregunta 5
INSERT INTO questions (id, question_text) VALUES (5, '¿Cuál es la capital de Japón?');
INSERT INTO options (question_id, option_text, is_correct) VALUES 
(5, 'Seúl', 0),
(5, 'Pekín', 0),
(5, 'Tokio', 1),
(5, 'Bangkok', 0);
