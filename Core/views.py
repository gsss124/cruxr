from django.shortcuts import render
from .models import Document

def uploadFile(request):
    if request.method == "POST":
        # Fetching the form data
        fileTitle = request.POST["fileTitle"]
        uploadedFile = request.FILES["uploadedFile"]

        # Saving the information in the database
        document = Document(
            title = fileTitle,
            uploadedFile = uploadedFile
        )
        document.save()

    documents = Document.objects.all()

    return render(request, "Core/upload-file.html", context = {
        "files": documents
    })
