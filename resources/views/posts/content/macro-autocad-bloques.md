Crear una macro para insertar, girar y escalar un bloque ya previamente creado en su espacio de trabajo de AutoCAD es bastante fácil. Para ello debes tener listo tu libro de Excel con el código para definir el punto base en AutoCAD donde quieres que la macro se ejecute. Si no lo recuerdas o no sabes cómo hacerlo ve al artículo **[Macro para iniciar un dibujo en AutoCAD](/blog/macro-para-iniciar-un-dibujo-en-autocad)**.

1. En AutoCAD crea tus bloques como prefieras, recuerda tomar en cuenta la escala con la que trabajas, así como el nombre que le darás a tu(s) bloques. 
2. Al crear tus bloques define el “Pick point”, que es el punto base con el que sueles mover un bloque una vez insertado.
3. Abre Excel y ten preparado el editor de Visual Basic.
4. La función que permite AutoCAD para realizar esto es la siguiente:

    {.blog-post-code}
    **InsertBlock**{style="color: #c0504d"}(**InsertionPoint**{style="color: #4bacc6"}, Name **As String**{style="color: #4bacc6"}, Xscale **as Double**{style="color: #4bacc6"}, Yscale **as Double**{style="color: #4bacc6"}, Zscale **as Double**{style="color: #4bacc6"}, Rotation **as Double**{style="color: #4bacc6"}) 

5. Ahora debes dimensionar la(s) variable(s) con las tres coordenadas de los puntos donde se va a colocar el bloque, para este ejemplo:

    {.blog-post-code}
    **DIM**{style="color: #4bacc6"} UBLOC(0 to 2) **as double**{style="color: #4bacc6"}<br>
    **DIM**{style="color: #4bacc6"} UBLOCF(0 to 2) **as double**{style="color: #4bacc6"} 

6. *InsertionPoint*: Partiendo del punto (x,y), debes sumar o restar para ubicar el punto base de tu bloque. Para este ejemplo:

    {.blog-post-code}
    UBLOC(0) = x - 320: UBLOC(1) = y + (longy / 2) + 20 

7. *Name As String*: Es el nombre tal cual le colocaste en AutoCAD a tu bloque. Para este ejemplo:

    {.blog-post-code}
    FLECHA_CORTE 

8. *Xscale as Double, Yscale as Double, Zscale as Double*: Al momento de insertar tu bloque puedes definir la escala en las tres direcciones o en las que se apeguen a tus necesidades. Tomando en cuenta que el valor de 1 es la escala como tienes creado tu bloque, si deseas aumentar la escala el valor debe ser mayor a 1, por el contrario, si deseas que tu bloque se adapte a una escala menor deberás colocar un valor menor a 1. Para este ejemplo:

    {.blog-post-code}
    1, 1, 1 

9. *Rotation as Double*: Será el giro que le desees dar a tu bloque si este lo requiere. Recuerda que este valor debe estar en radianes, ya sea que lo realices desde la hoja de Excel o dentro del código. Para este ejemplo:

    {.blog-post-code}
    0 

10. Finalmente se debe colocar la variable que permitirá ejecutar el comando en Excel. Para este ejemplo:

    {.blog-post-code}
    **Set**{style="color: #c0504d"} **IBLOCK**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.InsertBlock**{style="color: #c0504d"}(**UBLOC**{style="color: #4bacc6"}, "FLECHA CORTE", 1, 1, 1, 0)

---

Notas:

Si tu hoja de calculo tendrá celdas donde tengas la información de tus bloques, como; el nombre, escala, ángulo o incluso las coordenadas podrás hacer referencia a las celdas en la linea de comando mostrada antes. Por lo que si bien puedes combinar referencias con datos fijos o referenciar todo. Te dejamos ejemplo de ello:

{.blog-post-code}
**Set**{style="color: #c0504d"} **IBLOCK**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.InsertBlock**{style="color: #c0504d"}(**UBLOC**{style="color: #4bacc6"}, hoja1.range("A11").value, 1, 1, 1, hoja1.range("A12").value * [Pi()] / 180)

{.blog-post-code}
**Set**{style="color: #c0504d"} **IBLOCK**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.InsertBlock**{style="color: #c0504d"}(**UBLOC**{style="color: #4bacc6"}, hoja1.range("A11").value, hoja2.range("B21").value, hoja2.range("B22").value, hoja2.range("B23").value, hoja1.range("A12").value * [Pi()] / 180)


---

En el siguiente video se muestra este procedimiento y un ejemplo más para hacer la llamada a dos diferentes placas. Una de ellas se podrá rotar dependiendo la dirección de la retenida en una cimentación.

<iframe loading="lazy" id="embed_video" class="pagelayer-video-iframe" width="75%" height="450px" src="//www.youtube.com/embed/TUl6qw-6QzA?&amp;autoplay=0&amp;mute=0&amp;loop=0&amp;playlist=TUl6qw-6QzA" frameborder="0"></iframe>

Si deseas descargar los archivos usados en este video, por favor ve al artículo de [descargas](/area-de-descargas) que te permitirá descargar este material. Ayúdanos compartiendo o dejándonos un comentario sobre lo que te ha parecido esta macro.