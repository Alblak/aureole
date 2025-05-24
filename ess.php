<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>N°</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Frites (1 $/pièce)</td>
                <td>2</td>
                <td>2$</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Macaroni (2 $/pièce)</td>
                <td>1</td>
                <td>2$</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">TOTAL</td>
                <td>4$</td>
            </tr>
        </tfoot>
    </table>

    <button onclick="sendWhatsApp()">Confirmer la commande</button>

    <script>
        function sendWhatsApp() {
            // Données du tableau
            const tableData = [
                { produit: "Frites (1 $/pièce)", quantite: 2, total: "2$" },
                { produit: "Macaroni (2 $/pièce)", quantite: 1, total: "2$" }
            ];

            // Construire le message
            let message = "📋 **Détails de la commande**\n\n";
            tableData.forEach((row) => {
                message += `🍟 ${row.produit}\n`;
                message += `   - Quantité : ${row.quantite}\n`;
                message += `   - Total : ${row.total}\n\n`;
            });
            message += "💰 **TOTAL : 4$**";

            // Encoder le message pour l'URL
            const encodedMessage = encodeURIComponent(message);

            // Numéro de téléphone
            const phoneNumber = "243977139499"; // Sans le "+"

            // Créer le lien WhatsApp
            const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

            // Ouvrir le lien dans une nouvelle fenêtre
            window.open(whatsappLink, '_blank');
        }
    </script>
</body>
</html>