# Natillera

**Natillera** es una aplicación web desarrollada en **PHP** utilizando el patrón **Modelo Vista Controlador (MVC)**. Está diseñada para gestionar una natillera (un fondo común), permitiendo a los usuarios administrar aportes, retiros y saldos de manera eficiente. La aplicación también utiliza **CSS** para el diseño y estilo de la interfaz de usuario.

## Características

- **Gestión de Usuarios**: Permite a los usuarios registrarse, iniciar sesión y gestionar sus datos.
- **Aportes y Retiros**: Los usuarios pueden registrar aportes a la natillera y hacer retiros cuando sea necesario.
- **Reportes**: Muestra el balance general de la natillera y el historial de movimientos.
- **MVC**: Estructura del proyecto en Modelo, Vista y Controlador para una organización clara y separada de la lógica de negocio y la presentación.

## Tecnologías Utilizadas

- **PHP**: Lenguaje de programación para el desarrollo del lado del servidor.
- **MVC**: Patrón de diseño para separar la lógica de negocio de la presentación.
- **CSS**: Utilizado para el diseño y estilo de la aplicación.
  
## Estructura del Proyecto

- **Modelo**: Contiene la lógica de la base de datos y las operaciones relacionadas con la natillera y los usuarios.
- **Vista**: Gestiona la presentación de la interfaz de usuario (HTML + CSS).
- **Controlador**: Actúa como intermediario entre el modelo y la vista, manejando las solicitudes HTTP y los datos de los usuarios.

## Instalación

1. Clona el repositorio:

    ```bash
   git@github.com:juan1214s/natillera.git
    ```

2. Accede al directorio del proyecto:

    ```bash
    cd natillera
    ```

3. Configura la base de datos MySQL creando una base de datos para la aplicación y ejecuta el script SQL proporcionado en el directorio `/database`.

4. Configura el archivo `.env` o el archivo de configuración con los datos de conexión a la base de datos (si aplica).

5. Asegúrate de tener un servidor web configurado, como **XAMPP** o **WAMP**, y coloca los archivos del proyecto en el directorio adecuado (por ejemplo, `htdocs` en XAMPP).

6. Abre el navegador y accede a la aplicación desde `http://localhost/natillera`.

## Uso

1. **Registro de Usuarios**: Crea una cuenta para comenzar a gestionar tus fondos.
2. **Aportes**: Registra aportes a la natillera para ver el crecimiento de tu fondo.
3. **Retiros**: Realiza retiros cuando necesites retirar dinero del fondo.
4. **Balance**: Visualiza tu balance actual y revisa el historial de movimientos.
