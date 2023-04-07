Veremos como colocar uno o varios HATCH en nuestros proyectos de AutoCAD a través de EXCEL con la ayuda de macros. Si no lo recuerdas o no sabes cómo hacerlo ve al artículo **[Macro para iniciar un dibujo en AutoCAD](/blog/macro-para-iniciar-un-dibujo-en-autocad)**.

1. Abre Excel y ten preparado el editor de Visual Basic.
2. La función que permite AutoCAD para realizar esto es la siguiente:

    {.blog-post-code}
    **AddHatch**{style="color: #c0504d"}(PatternType **As Long**{style="color: #4bacc6"}, PatternName **As String**{style="color: #4bacc6"},Associativity **As Boolean**{style="color: #4bacc6"}) 

3. Ahora debes dimensionar una variable o las necesarias para que estos sean los contornos que mantendrán el HATCH, para este ejemplo:

    {.blog-post-code}
    **Dim**{style="color: #4bacc6"} CREF(0 to 0) **As AcadEntity**{style="color: #4bacc6"} 
   
    > Para poder explicar esto necesitamos crear una figura que va a contener el HACTH. En este ejemplo usaremos un círculo. Si no recuerdas como hacer un círculo en AutoCAD a través de macros, puedes primero leer el artículo: **[Macro Excel para dibujar en AutoCAD - Círculos](/blog/macro-excel-para-dibujar-en-autocad-circulos)**

4. *PatternType As Long*. En AutoCAD debemos conocer que tipo de Pattern vamos a usar, si estos serán los predefinidos por el programa o unos creados por el usuario. Cuando son los predefinidos del programa, tenemos dos opciones de colocar este parámetro: **1** o **acHatchPatternTypePreDefined**.

5. *PatternName As String*. En AutoCAD debemos conocer nombre del Pattern o patrón de los predefinidos que vamos a usar. En este ejemplo usaremos: **"SOLID"**

6. *Associativity As Boolean*. Es un parámetro que nos permite indicar que el HATCH será o no asociativo, lo que significa que cuando realicemos algún cambio al contorno el HATCH se ajustará al contorno. Por lo que para este ejemplo lo dejaremos como **True**, es decir que si sea asociativo.

    > Es importante saber que el dejar que sea un HATCH asociativo puede disminuir el rendimiento de tu proyecto (la máquina podría alentarse si usas mucho HATCH). Si este esta lleno de HACTH y si nunca cambiaran los objetos, lo recomendable es dejarlo como **False**

![Hatch Block](/storage/images/posts/Hatch-Blog.png)

7. Ya tenemos lista nuestra linea para colocar el HATCH, sin embargo, debemos indicar ahora a que objeto u objetos les colocaremos el HATCH. Para ello esta linea debe estar antes de crear el objeto y después de crearlo se colocarán las propiedades del HATCH que deseemos configurar.

   {.blog-post-code}
   **Dim**{style="color: #4bacc6"} CREF(0 to 0) **As AcadEntity**{style="color: #4bacc6"}<br><br>
   **For i**{style="color: #4bacc6"} = 1 To **Range("I6").Value**{style="color: #4bacc6"}<br><br>
   **Set**{style="color: #c0504d"} **SolidoVar**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddHatch**{style="color: #c0504d"}(**1,"SOLID", True**{style="color: #4bacc6"})<br><br>
   CIRREF(0) = x + **Range("I2").Value**{style="color: #4bacc6"} * **i**{style="color: #4bacc6"}: CIRREF(1) = y<br><br>
   **Set**{style="color: #c0504d"} **CREF (0)**{style="color: #4bacc6"} **= AutoCAD.Application.ActiveDocument.ModelSpace.AddCircle**{style="color: #c0504d"}(**CIRREF, Range("I5").Value**{style="color: #4bacc6"})<br>
   **CREF(0)**{style="color: #4bacc6"}**.Layer =**{style="color: #c0504d"} "2"<br><br>
   **SolidoVar**{style="color: #4bacc6"}.AppendOuterLoop (CREF)<br>
   **SolidoVar**{style="color: #4bacc6"}.Evaluate<br>
   **SolidoVar**{style="color: #4bacc6"}.Layer = "Varilla"<br><br>
   **Next i**{style="color: #4bacc6"}

---

NOTAS:

El parámetro **.AppendOuterLoop (Variable)** es el que nos permite identificar en AutoCAD el limite de la figura o bien la forma en la que queremos que tome como limite el HATCH. Existe otro parámetro llamado **.AppendInnerLoop (Variable)** que nos permite indicar cual sería el limite de un AcadEntity en caso de que este sea un objeto interno al cual no queremos que se le aplique el HATCH.

Recuerda que existen más parámetros que pueden modificar al HACTH y que dependen del patrón que uses, como por ejemplo: Si usas "ANSI31", podrías modificar la escala, la transparencia, el ángulo de las lineas. Por lo que podría quedar de la siguiente manera:

{.blog-post-code}
**SolidoVar**{style="color: #4bacc6"}.AppendOuterLoop (CREF)<br>
**SolidoVar**{style="color: #4bacc6"}.Evaluate<br>
**SolidoVar**{style="color: #4bacc6"}.PatternScale = 50<br>
**SolidoVar**{style="color: #4bacc6"}.PatternAngle = 10*3.1416/180<br>
**SolidoVar**{style="color: #4bacc6"}.EntityTransparency = 50<br>
**SolidoVar**{style="color: #4bacc6"}.Layer = "Varilla"

Recuerda que puedes referenciar todos los valores de los parámetros a las celdas de Excel.

---

En el siguiente video podrás encontrar este procedimiento y un ejemplo con una polilinea en forma de rectángulo.

<iframe loading="lazy" id="embed_video" class="pagelayer-video-iframe" width="75%" height="450px" src="//www.youtube.com/embed/Q-Ut-hyptE0?&amp;autoplay=0&amp;mute=0&amp;loop=0&amp;playlist=Q-Ut-hyptE0" frameborder="0"></iframe>

Si deseas descargar los archivos usados en este video, por favor ve al artículo de [descargas](/area-de-descargas) que te permitirá descargar este material. Ayúdanos compartiendo o dejándonos un comentario sobre lo que te ha parecido esta macro.