# Reflexión (Etapa 4)

Responde con tus palabras (mínimo 40 palabras por respuesta). Ver README, Etapa 4.

## Pregunta 1

Mi código es d3ec616c y gettype() es de tipo string  porque lo saqué con substr( y substr siempre devuelve un pedazo de texto aunque ese texto tenga números Si quisiera sumarlo, por ejemplo "d3ec616c" + 1, php no lo puede convertir a número porque empieza con una letra, y lanza un TypeError  Lo probé  y me dio ese error



## Pregunta 2

mi precio es 323.53 y gettype() dice double por que PHP guarda los decimales en un double del lenguaje C, y gettype quedó con ese nombre aunque en el código digamos float.  0.1 + 0.2 == 0.3 da false porque esos números no se pueden guardar exactos en binario y la suma da un numero muy largo y decimal mi $n1 vale 68 y es integer  Si divido 68 / 20 con la barra me da 3.4  pero intdiv(68, 20) me da 3, porque hace la división entera y bota los decimales.



## Pregunta 3

define() crea la constante cuando se ejecuta esa línea así que se puede usar dentro de un if o de una función const se define cuando PHP compila el archivo y tiene que ir arriba del todo o dentro de una clase, use  define para SEMILLA\_LAB8 y const para LAB\_NUMERO Cuando intenté redefinir SEMILLA\_LAB8 con define el resultado fue falso porque una constante no es editable el @ solo esconde la alerta Lo probé con php 8.2.12 en Apache 2.4.58 de XAMPP Windows 11

