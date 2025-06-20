import imaplib
import email

# Datos de acceso
usuario = "rj45redd@gmail.com"
contrasena = "ijhwoxsxcxcicdrx"
# Conexión a Gmail
mail = imaplib.IMAP4_SSL("imap.gmail.com")
mail.login(usuario, contrasena)

# Seleccionar inbox
mail.select("inbox")

# Buscar todos los correos
status, mensajes = mail.search(None, "ALL")
ids = mensajes[0].split()
ids = ids[:100]  # Limitar cantidad de mails analizados

for num in ids:
    status, data = mail.fetch(num, "(RFC822)")
    for respuesta in data:
        if isinstance(respuesta, tuple):
            msg = email.message_from_bytes(respuesta[1])
            cuerpo = ""
            if msg.is_multipart():
                for parte in msg.walk():
                    if parte.get_content_type() == "text/plain":
                        try:
                            cuerpo += parte.get_payload(decode=True).decode()
                        except:
                            pass
            else:
                try:
                    cuerpo += msg.get_payload(decode=True).decode()
                except:
                    pass

            if "decidido no seguir" in cuerpo.lower():
                print("📬 Eliminando correo con asunto:", msg["Subject"])
                print("------ CUERPO DEL MAIL ------")
                print(cuerpo)
                print("-----------------------------")
                # Copiar a la papelera
                mail.copy(num, "[Gmail]/Trash")
                # Marcar como eliminado en inbox
                mail.store(num, "+FLAGS", "\\Deleted")

# Eliminar marcados
mail.expunge()
mail.close()
mail.logout()
