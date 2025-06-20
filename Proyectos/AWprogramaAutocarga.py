import time
import tkinter as tk
from tkinter import messagebox
from pywinbox import PyWinBox

def configurar_antena(mac_address, ip_publica, ip_privada, usuario_pppoe, password_pppoe, nombre_cliente, password_router):
    try:
        print("Conectando a la antena...")
        from pywinbox import PyWinBox

        # conexión correcta
        client = PyWinBox(mac_address)
        client.login(username="admin", password="")
         # Usuario default después del reset

        print("Reseteando la antena...")
        client.run_command("/system/reset-configuration", {'no-defaults': True})

        print("Esperando reinicio de la antena...")
        time.sleep(60)  # Esperamos 1 minuto (puede ajustarse si es necesario)

        # Volver a conectar después del reinicio
        client = PyWinBox(host=mac_address, port=20561, timeout=20)
        client.login(username="admin", password="")

        print("Configurando bridges...")
        client.run_command("/interface/bridge/add", {"name": "bridge1", "protocol-mode": "none"})
        client.run_command("/interface/bridge/add", {"name": "bridge2", "protocol-mode": "none"})

        print("Asignando puertos a bridges...")
        client.run_command("/interface/bridge/port/add", {"interface": "ether1", "bridge": "bridge2"})
        client.run_command("/interface/bridge/port/add", {"interface": "wlan1", "bridge": "bridge1"})

        print("Asignando IPs...")
        client.run_command("/ip/address/add", {"address": ip_publica, "interface": "bridge1"})
        client.run_command("/ip/address/add", {"address": ip_privada, "interface": "bridge2"})

        print("Configurando DNS...")
        client.run_command("/ip/dns/set", {"servers": "190.108.193.60,190.108.193.1", "allow-remote-requests": "yes"})

        print("Configurando DHCP Server...")
        client.run_command("/ip/pool/add", {"name": "dhcp_pool", "ranges": "192.168.0.10-192.168.0.100"})
        client.run_command("/ip/dhcp-server/add", {
            "name": "dhcp1",
            "interface": "bridge2",
            "address-pool": "dhcp_pool",
            "disabled": "no"
        })
        client.run_command("/ip/dhcp-server/network/add", {
            "address": "192.168.0.0/24",
            "gateway": "192.168.0.254",
            "dns-server": "190.108.193.60,190.108.193.1"
        })

        print("Configurando cliente PPPoE...")
        client.run_command("/interface/pppoe-client/add", {
            "name": "pppoe-out1",
            "interface": "bridge1",
            "user": usuario_pppoe,
            "password": password_pppoe,
            "disabled": "no",
            "add-default-route": "yes",
            "use-peer-dns": "yes"
        })

        print("Configurando NAT...")
        client.run_command("/ip/firewall/nat/add", {
            "chain": "srcnat",
            "out-interface": "pppoe-out1",
            "action": "masquerade"
        })

        print("Configurando Wireless...")
        client.run_command("/interface/wireless/set", {
            ".id": "wlan1",
            "disabled": "no",
            "mode": "station-wds",
            "band": "5ghz-a",
            "channel-width": "20/40mhz-ht-above",
            "frequency-mode": "manual-txpower",
            "country": "ireland",
            "antenna-gain": "0",
            "wireless-protocol": "any",
            "default-authentication": "yes",
            "default-forwarding": "yes"
        })

        print("Cambiando nombre de sistema...")
        client.run_command("/system/identity/set", {"name": nombre_cliente})

        print("Configurando nueva contraseña...")
        client.run_command("/user/set", {
            "numbers": "0",
            "password": password_router
        })

        messagebox.showinfo("Listo", "La antena fue configurada exitosamente.")

    except Exception as e:
        messagebox.showerror("Error", f"Hubo un error: {str(e)}")

def iniciar_programa():
    mac_address = entry_mac.get()
    ip_publica = entry_ip_publica.get()
    ip_privada = entry_ip_privada.get()
    usuario_pppoe = entry_usuario_pppoe.get()
    password_pppoe = entry_password_pppoe.get()
    nombre_cliente = entry_nombre_cliente.get()
    password_router = entry_password_router.get()

    configurar_antena(mac_address, ip_publica, ip_privada, usuario_pppoe, password_pppoe, nombre_cliente, password_router)

# Interfaz gráfica
ventana = tk.Tk()
ventana.title("Configurador de Antenas PPPoE")

labels = [
    "MAC de la antena:",
    "IP Pública (Antena) con /24:",
    "IP Privada (LAN) con /24:",
    "Usuario PPPoE:",
    "Contraseña PPPoE:",
    "Nombre del Cliente:",
    "Nueva Contraseña del Router:"
]

entries = []

for label in labels:
    tk.Label(ventana, text=label).pack()
    entry = tk.Entry(ventana)
    entry.pack()
    entries.append(entry)

entry_mac, entry_ip_publica, entry_ip_privada, entry_usuario_pppoe, entry_password_pppoe, entry_nombre_cliente, entry_password_router = entries

tk.Button(ventana, text="Configurar Antena", command=iniciar_programa).pack(pady=10)

ventana.mainloop()
