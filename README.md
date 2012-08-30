extranet-file-browser
=====================

remotely submit your paperwork to the office-includes auto email a copy to some mailbox

Piece of a back-end administration web app with some basic file manager functionality, including uploading of xml-based job sheets.

This may still have some (GoC) branding on it and is not quite as sophisticated as a later project, which features PDF file previews and nicer front-end UX.

Features a banking section which automatically creates CSV files (per GoC spec) using an online form (previously these files were created offline and emailed). The credit card section here does not implement the SSL encryption delivered as final product (from memory, it will just transfer documents completely insecurely - obviously for testing purposes actual sensitive information was not used) because purchasing my own CA certificate for the Proof-of-Concept was not within the budget...