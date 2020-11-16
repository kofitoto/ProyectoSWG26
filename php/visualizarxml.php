<?php 
                $xml = simplexml_load_file("../xml/Questions.xml");
                echo '<table border="1px" class="Tabla_pregutas"><tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th><th>Respuestas Incorrectas</th><th>Tema</th></tr>';
                foreach ($xml->children() as $assessmentItem){
                     $atributos = $assessmentItem->attributes();
                     echo"<tr>";
                        echo"<td>".$atributos['author']."</td>";
                    foreach($assessmentItem->children() as $child)
                    {
                        if ($child->getName() == 'itemBody') {
                            echo "<td>$child->p</td>";
                        }
                        if($child->getName()=='correctResponse'){
                            echo "<td>$child->response</td>";
                        }
                         if($child->getName()=='incorrectResponses'){
                             echo"<ul><td align=left>";
                             foreach($child->children() as $respuestaIncorrecta){
                                 
                                echo "<li>".$respuestaIncorrecta."</li>";
                             }
                             echo"</ul></td>";
                        }
                    }
                    echo "<td>".$atributos['subject']."</td>";
                    echo"</tr>";
                }
                echo"</table>"
            ?>