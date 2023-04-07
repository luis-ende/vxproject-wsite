En esta ocasión les mostraremos como dibujar círculos a través de una macro en Excel. Para ello debes tener listo tu libro de Excel con el código para definir el punto base en AutoCAD donde quieres que la macro se ejecute. Si no lo recuerdas o no sabes cómo hacerlo ve al artículo **[Macro para iniciar un dibujo en AutoCAD](/blog/macro-para-iniciar-un-dibujo-en-autocad)**.

---

1. Abre Excel y ten preparado el editor de Visual Basic.
2. La función que permite AutoCAD para realizar esto es la siguiente:

    {.blog-post-code}
    **AddCircle**{style="color: #c0504d"}(**Center**{style="color: #4bacc6"}, Radius **As Double**{style="color: #4bacc6"})

3. Ahora debes dimensionar la variable con las tres coordenadas de los puntos donde se va a colocar el bloque, para este ejemplo:

    {.blog-post-code}
    **Dim**{style="color: #4bacc6"} CIRREF(0 To 2) **As Double**{style="color: #4bacc6"} 

4. *Center*. Partiendo del punto (x,y), debes sumar o restar para ubicar el punto base de tu bloque. Para este ejemplo:

    {.blog-post-code}
    CIRREF(0) = x: CIRREF(1) = y 

5. *Radius As Double*. El radio del círculo puedes colocarlo de dos maneras; una forma es colocar el valor directamente en el código, y la otra es tomando el valor de alguna celda de Excel. Para este ejemplo:

    {.blog-post-code}
    50 

6. Ahora aplicamos la función con los parámetros obtenidos. También se debe colocar el layer a utilizar para dibujar el círculo. Para este ejemplo:

    {.blog-post-code}
    **Set**{style="color: #c0504d"} **CREF**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddCircle(**{style="color: #c0504d"}**CIRREF, 50**{style="color: #4bacc6"})<br>
    **CREF**{style="color: #4bacc6"}**.Layer =**{style="color: #c0504d"} "2" 

    Si requieres hacer una hilera de círculos ya sea de manera horizontal o vertical debes seguir los siguientes pasos (se usará el ciclo **for** con la variable i):

7. Se debe crear una linea con el ciclo **for**, donde se evaluarán los círculos de 1 a n. Para este ejemplo:

    {.blog-post-code}
    **n**{style="color: #4bacc6"}= 6<br>
    **For**{style="color: #4bacc6"} i=1 to **n**{style="color: #4bacc6"} 

8. Se deben definir las ubicaciones de todos los círculos - dentro del **For**. Se usará la separación que habrá entre los círculos de centro a centro. Para este ejemplo:

   **Cuando se quieren los círculos de manera horizontal:**
    {.blog-post-code}
    CIRREF(0) = x + 100 * **i**{style="color: #4bacc6"}: CIRREF(1) = y<br>
    
    **Cuando se quieren los círculos de manera vertical:**
    {.blog-post-code}
    CIRREF(0) = x: CIRREF(1) = y + 100 * **i**{style="color: #4bacc6"}<br>
    
9. Ahora aplicamos la función con los parámetros obtenidos - dentro del **For**. También se debe colocar el layer a utilizar para dibujar el círculo. Para este ejemplo:

    {.blog-post-code}
    **Set**{style="color: #c0504d"} **CREF**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddCircle(**{style="color: #c0504d"}**CIRREF, 50**{style="color: #4bacc6"})<br>
    **CREF**{style="color: #4bacc6"}**.Layer =**{style="color: #c0504d"} "2"

10. Cerramos el **For** con: **Next i**{style="color: #4bacc6"}

    {.blog-post-code}
    **n**{style="color: #4bacc6"}**= 6**{style="color: #c0504d"}<br>
    **For i**{style="color: #4bacc6"}**=1 to**{style="color: #c0504d"} **n**{style="color: #4bacc6"}

    {.blog-post-code}
    CIRREF(0) = x + 100 * i: CIRREF(1) = y

    {.blog-post-code}
    **Set**{style="color: #c0504d"} **CREF**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddCircle(**{style="color: #c0504d"}**CIRREF, 50**{style="color: #4bacc6"})<br>
    **CREF**{style="color: #4bacc6"}**.Layer =**{style="color: #c0504d"} "2"

    {.blog-post-code}
    **Next i**{style="color: #4bacc6"}

---

Notas:

Recuerda que los valores usados dependerán de la escala que manejes es tu espacio de trabajo de AutoCAD así como la escala de tus cotas.

Si tu hoja de calculo tendrá celdas con información de la separación de los círculos, número de círculos y el radio, entonces podrás referenciar a esas celdas. Por lo que el código para este ejemplo queda de la siguiente manera:

{.blog-post-code}
**For i**{style="color: #4bacc6"} = 1 To **Range("I6").Value**{style="color: #4bacc6"}

{.blog-post-code}
CIRREF(0) = x + **Range("I2").Value**{style="color: #4bacc6"} * **i**{style="color: #4bacc6"}: CIRREF(1) = y

{.blog-post-code}
**Set**{style="color: #c0504d"} **CREF**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddCircle(**{style="color: #c0504d"}**CIRREF, Range("I5").Value**{style="color: #4bacc6"})<br>
**CREF**{style="color: #4bacc6"}**.Layer =**{style="color: #c0504d"} "2"

{.blog-post-code}
**Next i**{style="color: #4bacc6"}

---

En el siguiente video se muestra este procedimiento.

<iframe loading="lazy" id="embed_video" class="pagelayer-video-iframe" width="75%" height="450px" src="//www.youtube.com/embed/7TAEp988AcE?&amp;autoplay=0&amp;mute=0&amp;loop=0&amp;playlist=7TAEp988AcE" frameborder="0"></iframe>

Si deseas descargar los archivos usados en este video, por favor ve al artículo de [descargas](/area-de-descargas) que te permitirá descargar este material. Ayúdanos compartiendo o dejándonos un comentario sobre lo que te ha parecido esta macro.