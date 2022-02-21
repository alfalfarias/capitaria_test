# BACKEND

    1. REQUERIMIENTOS
        1.1. PHP 8.0
        1.2. Composer 1.10.7
        1.3. MariaDB 10.4.13 (O MySQL)

    2. DEPLOYMENT
        2.1. Copiar el archivo .env.example (ubicado en la raíz del proyecto) y solo nombrarlo como ".env".
        2.2. En el archivo ".env" adjuntar las credenciales de acceso a la Base de Datos, ejemplo:
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=capitaria_test
            DB_USERNAME=root
            DB_PASSWORD=password
        2.3. Ejecutar las migraciones con el comando:
            php artisan migrate
        2.4. Ejecutar la data de prueba con el comando:
            php artisan db:seed
        2.5. Iniciar el servidor HTTP con el comando:
            php artisan serve
        2.6. Consuma los servicios (endpoints) con la colección de Postman
# DOCUMENTACIÓN

    A. CASOS DE USO
        1. Profesores (teachers)
        1.1. Crear profesor
        1.2. Actualizar profesor
        1.3. Listar profesores
        1.4. Borrar profesor

        2. Cursos (courses)
        2.1. Crear curso
        2.2. Actualizar curso
        2.3. Listar cursos
        2.4. Borrar curso

        3. Cursos (courses_evaluations)
        3.1. Crear evaluación del curso
        3.2. Actualizar evaluación del curso
        3.3. Listar evaluaciones del curso
        3.4. Borrar evaluación del curso

        4. Alumnos (students)
        4.1. Crear estudiante
        4.2. Actualizar estudiante
        4.3. Listar estudiantes
        4.4. Borrar estudiante

        5. Notas (students_evaluations)
        5.1. Crear nota de estudiante
        5.2. Actualizar nota de estudiante
        5.3. Listar notas de estudiante
        5.4. Borrar nota de estudiante

        6. Extra
        6.1. Listar a los alumnos junto a su promedio de notas.
        6.2. Filtar a todos los alumnos con más de un ramo con promedio rojo.

    B. BASE DE DATOS
        DB -> https://i.imgur.com/C6svfxi.png

    C. POSTMAN (Colección de requests)
        Postman collection tests -> https://www.getpostman.com/collections/689c6a4d5cc0068b0ef9
# PREGUNTAS DE LA EVALUACIÓN

1. Escriba una Query que entregue la lista de alumnos para el curso "programación".
---
    SELECT students.* 
    FROM students
    INNER JOIN students_courses ON students.id = students_courses.student_id
    INNER JOIN courses ON courses.id = students_courses.course_id
    WHERE courses.name = 'Programacion';
---

2. Escriba una Query que calcule el promedio de notas de un alumno en un curso.
---
    SELECT students.*, SUM(students_evaluations.value)/COUNT(students_evaluations.value) AS average 
    FROM students
    INNER JOIN students_evaluations ON students.id = students_evaluations.student_id
    INNER JOIN courses_evaluations ON courses_evaluations.id = students_evaluations.evaluation_id
    WHERE students.id = 1 AND courses_evaluations.course_id = 1
    GROUP BY students.id;
---

3. Escriba una Query que entregue a los alumnos y el promedio que tiene en cada curso.
---
    SELECT students.id, students.dni, students.name, students.surname, courses.id, courses.name, SUM(students_evaluations.value)/COUNT(students_evaluations.value) AS average
    FROM students
    INNER JOIN students_courses ON students.id = students_courses.student_id
    INNER JOIN courses ON courses.id = students_courses.course_id
    INNER JOIN students_evaluations ON students.id = students_evaluations.student_id
    GROUP BY students.id, courses.id;
---

4. Escriba una Query que lista a todos los alumnos con más de un curso con promedio rojo.
---
    SELECT students.* FROM (
        SELECT averages.*, COUNT(course_id) AS quantity
        FROM (
            SELECT students.id AS student_id, students.dni AS student_dni, students.name AS student_name, students.surname AS student_surname, courses.id AS course_id, courses.name AS course_name, SUM(students_evaluations.value)/COUNT(students_evaluations.value) AS course_average
            FROM students
            INNER JOIN students_courses ON students.id = students_courses.student_id
            INNER JOIN courses ON courses.id = students_courses.course_id
            INNER JOIN students_evaluations ON students.id = students_evaluations.student_id
            GROUP BY students.id, courses.id
        ) AS averages
        WHERE course_average < 50
        GROUP BY student_id
    ) AS red_averages
    INNER JOIN students 
    ON students.id = red_averages.student_id
    WHERE red_averages.quantity > 1;
---

5. Dejando de lado el problema del cólegio se tiene una tabla con información de jugadores de tenis: PLAYERS(Nombre, Pais, Ranking). Suponga que Ranking es un número de 1 a 100 que es distinto para cada jugador. Si la tabla en un momento dado tiene solo 20 registros, indique cuantos registros tiene la tabla que resulta de la siguiente consulta: 
SELECT c1.Nombre, c2.Nombre
FROM PLAYERS c1, PLAYERS c2
WHERE c1.Ranking > c2.Ranking
---
    La tabla que resulta de la consulta tiene 190 registros.
---