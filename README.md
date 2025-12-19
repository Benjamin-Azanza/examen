# CASO 8 – Biblioteca Barrial

## Cliente
Biblioteca **“Luz del Saber”**

## Usuario
Profesora Margarita – Encargada de la biblioteca

---

## Descripción del sistema
Este proyecto implementa un módulo de gestión de préstamos de libros para una biblioteca barrial,
desarrollado en Laravel siguiendo el patrón MVC.  
El sistema permite registrar, consultar, editar y cerrar préstamos, manteniendo un historial
de los libros prestados.

---

## Requerimientos cubiertos

El sistema permite registrar:
- Título del libro
- Nombre de la persona que se lleva el libro
- Teléfono de contacto
- Fecha límite de devolución
- Estado del préstamo (prestado / devuelto)

La fecha de registro del préstamo se genera automáticamente mediante `created_at`.

---

## Decisiones de diseño

### Patrón MVC
Se utilizó el patrón **Modelo – Vista – Controlador**:
- **Modelo (`Prestamo`)**: define la estructura de datos y el acceso a la base de datos.
- **Controlador (`PrestamoController`)**: maneja la lógica del negocio y las validaciones.
- **Vistas (Blade)**: presentan la información al usuario mediante una interfaz sencilla.

---

### CRUD completo
El sistema implementa un CRUD completo:
- **Create**: registrar un préstamo.
- **Read**: listar todos los préstamos.
- **Update**: editar un préstamo existente.
- **Delete lógico**: marcar un préstamo como devuelto sin eliminar el registro.

---

### Eliminación lógica (historial)
Siguiendo la recomendación del comité, los préstamos **no se eliminan físicamente**.
En su lugar, se utiliza un campo booleano `devuelto` para conservar el historial de préstamos
realizados.

---

### Base de datos
Se utilizó **SQLite** por su simplicidad de configuración en un entorno académico.
La tabla `prestamos` contiene los campos necesarios para cubrir el caso de uso.

---

### Interfaz de usuario
La interfaz fue desarrollada con:
- **Blade**
- **Bootstrap**
- Diseño responsivo, accesible desde dispositivos móviles

Esto permite a la encargada consultar y registrar préstamos desde su celular.

---

## Tecnologías utilizadas
- Laravel
- PHP
- SQLite
- Blade
- Bootstrap

---

