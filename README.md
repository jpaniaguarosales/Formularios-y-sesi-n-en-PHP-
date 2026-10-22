Formularios y sesión

Módulo: Desarrollo web en entorno servidor (DAW)
Centro: IES Balmaseda BHI

1. Descripción

El objetivo de este reto es crear un sistema de inicio de sesión para el personal de la cafetería, registrar pedidos mediante formularios y permitir cerrar la sesión.

Se utilizan formularios con el método POST y sesiones de PHP para controlar el acceso a la página del pedido.

2. Archivos

El proyecto contiene tres archivos:

login.php: muestra el formulario de inicio de sesión, comprueba el usuario y la clave, y permite acceder al pedido si los datos son correctos.

pedido.php: comprueba que exista una sesión, muestra el formulario del pedido, valida los datos y calcula el importe.

logout.php: cierra la sesión y redirige al formulario de inicio de sesión.

3. Datos de acceso

Usuario: daw

Clave: daw2026

4. Carta de productos

Código

Producto

Precio

A

Café solo

1,20 €

B

Café con leche

1,50 €

C

Bocadillo

2,80 €

D

Agua

1,00 €

El importe se calcula multiplicando el precio del producto por las unidades solicitadas.

5. Seguridad y validaciones

Se utiliza $_POST para recibir los datos de los formularios.

Se utiliza $_SESSION para mantener el inicio de sesión.

Se comprueba que el usuario y la clave sean correctos.

Se impide acceder al pedido sin haber iniciado sesión.

Se valida que el código del producto exista y que las unidades sean iguales o superiores a 1.

Se utiliza htmlspecialchars() para mostrar de forma segura el nombre del usuario y el producto.

Se destruye la sesión al cerrar sesión.

6. Pruebas

Acceder a http://dwes.test/ud07/pedido.php sin iniciar sesión y comprobar que redirige al login.

Introducir una clave incorrecta y comprobar que aparece el aviso de error.

Iniciar sesión con el usuario daw y la clave daw2026.

Introducir el código B y 2 unidades. El resultado debe ser 3,00 €.

Probar un código incorrecto y unidades inferiores a 1.

Cerrar sesión e intentar acceder de nuevo al pedido.

7. Entrega

El archivo de entrega es r05-sesion.zip y contiene los tres archivos PHP:

login.php

pedido.php

logout.php
