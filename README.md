# Agenda Synfony

Bienvenido a mi Agenda de Synfony, esta agenda te permite guardar tus contactos por _profecionales y personales_ para separarlos de formas ordenadas y no confundirte


## Como se usa?

Con la agenda abierta puedes crear guardar contactos _personales o profecionales_ con su:

| Option | Description |
| ------ | ----------- |
| Nombew  | Nombre de la persona. |
| Apellido | Apellido de la persona. |
| Correo   | Correo de la persona. |
| Telefono   |Telefono de la persona. |
| Tipo de agenda   |Tipo de agenda personal o profecional.|
| Notas   |Informacion extra que se puede añadir como por ejemplo direccion, fechas de reuniones, nombre de su empresa entre otras cosas. |

Luego de ser agregado se puede ver las agendas agrupadas por tipo de agendas y se puede ver en una lista, ademas de eso puedes ver los contactos mas a fondo, editarlos y/o borrarlos

## Requisitos

Es necesario tener los siguietes programas o librerias para que funcione:

* Synfony
* Composer
* XAMPP
* Un lector de codigo como VS code


## Guia de instalacion

Para usar la agenda tienes que descargarlos y guardarno en una carpeta, luego con tu CMD vas a ejecutar el siguiente comando: 

    symfony server:start
   
Luego de esto podras ir a tu puerto:

	http://127.0.0.1:8000/contacto/
    
Donde la agenda ya estara funcionando correctamente

## Tecnologías utilizadas.

* Synfony
* Composer
* VS code
* XAMPP
* MySQL


## Codigo del filro de tipo de agenda

	/**
     * @Route("/{id}/edit", name="contacto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contacto $contacto): Response
    {
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacto_index');
        }

        return $this->render('contacto/edit.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

## Autor
Mi persona **Carlos Jose Torres Baietti**

## Licencia

![Minion](https://tic100tifiko.files.wordpress.com/2018/10/cc-zero-badge.png?w=500)


## Cómo contribuir al proyecto.

Puedes usar el enlace de Git y modificarlo y/o mejorarlo en el siguiente enlace:

https://github.com/Xernescx/agendaSynfony


 
