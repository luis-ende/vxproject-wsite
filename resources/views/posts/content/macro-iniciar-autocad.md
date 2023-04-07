Crear una macro en Excel para llevar tus datos a AutoCAD y poder dibujarlos con un solo clic es posible. Por lo que te invitamos a leer nuestros artículos relacionados con la categoría EXCEL CAD. En los cuales te iremos mostrando paso a paso como utilizar algunos de los comandos más comunes en AutoCAD a través del lenguaje de programación de Visual Basic Applications.

En los siguientes pasos te mostraremos como hacer funcionar los comandos de AutoCAD en Excel y como tomar un punto de referencia en el espacio Model.

---

1. Al tener abierto un nuevo libro de Excel debes ir al editor de Visual Basic que se encuentra en las pestañas de la parte superior llamado Programador o Desarrollador.
   1. En caso no tener activa la pestaña lo que debes hacer para activarla: Ir a la pestaña Archivo y en la barra izquierda hasta la esquina inferior selecciona Opciones. Se abrirá una ventana en la cual debes buscar Personalizar cinta de opciones. De lado derecho aparecerá una columna con todas las pestañas posibles que puedes tener activas o no en tus libros de Excel. Ahora activa la opción de Programador o Desarrollador (depende de tu versión de Office).

    {.blog-post-image-block}
    ![Cinta](/storage/images/posts/Cinta1.jpg) 
    ![Activar Programador](/storage/images/posts/ActivarProgramador.jpg)

2. En el editor encontraras una nueva cinta de opciones. En este caso lo primero que haremos es ir a la que se llama Herramientas > Referencias. Se abrirá un cuadro en donde se tiene un listado de todas las referencias disponibles. Tendrás que buscar y activar 4 que son de AutoCAD (si tienes más versiones de AutoCAD busca las referencias de esa versión) como aparece a continuación:

    {.blog-post-image-block}
    ![Activar Re](/storage/images/posts/ActivarRe.jpg) 
    ![Activar referencia](/storage/images/posts/ActivarReferencia.jpg)

3. Ahora en el editor tienes una barra de lado izquierdo donde podrás ver lo que contiene tu libro que de momento son las hojas. Por lo que tendrás que dar un clic derecho sobre el nombre de tu libro > Insertar > Modulo. Ahora aparecerá un nuevo módulo al cual deberás dar doble clic y se abrirá un espacio en blanco de lado derecho.

    ![Insertar módulo](/storage/images/posts/InsertarMod.jpg)

4. En ese espacio en blanco deberás crear una rutina con el nombre que desees, en ella pondremos la función GetPoint que nos permitirá obtener un punto que marquemos en AutoCAD el cual será el punto de referencia para que nuestros trazos se plasmen a través de coordenadas en el espacio. Para este ejemplo:

    {.blog-post-code}
    **Sub**{style="color: #4bacc6"} **principal_rec()**<br>
    **pto**{style="color: #4bacc6; padding-left: 10px"} **= AutoCAD.Application.ActiveDocument.Utility.GetPoint**{style="color: #c0504d"}**(, "Click en punto:")**<br>
    **x**{style="color: #4bacc6; padding-left: 10px"} **= pto(0):** **y**{style="color: #4bacc6"} **= pto(1)**<br>
    **End Sub**{style="color: #4bacc6"}

5. Posteriormente podrás hacer la llamada a otra rutina con los parámetros de tu punto o bien sobre esa rutina dejar todas las líneas de comando.
   
   {.blog-post-code}
   **Sub**{style="color: #4bacc6"} **principal_rec()**<br>
   **pto**{style="color: #4bacc6; padding-left: 10px"} **= AutoCAD.Application.ActiveDocument.Utility.GetPoint**{style="color: #c0504d"}**(, "Click en punto:")**<br>
   **x**{style="color: #4bacc6; padding-left: 10px"} **= pto(0):** **y**{style="color: #4bacc6"} **= pto(1)**<br>
   <br>
   **Call dib_rectangulo(**{style="padding-left: 10px"} **x, y**{style="color: #4bacc6"} **)**<br>
   **End Sub**{style="color: #4bacc6"}
   
---

En el siguiente video se muestra este procedimiento y ejemplos del uso de la Polyline.

<iframe loading="lazy" id="embed_video" class="" width="75%" height="450px" src="//www.youtube.com/embed/Mjtm6ErlAW8?&amp;autoplay=0&amp;mute=0&amp;loop=0&amp;playlist=Mjtm6ErlAW8" frameborder="0"></iframe>

Si deseas descargar los archivos usados en este video, por favor ve al artículo de [descargas](/area-de-descargas) que te permitirá descargar este material. Ayúdanos compartiendo o dejándonos un comentario sobre lo que te ha parecido esta macro.