from django.shortcuts import render
from django.http import HttpResponse
# Create your views here.
# create your views here.
def index(request):
    return render (request,'index.html')
def About(request):
    return render(request,'About.html')
def Services(request):
    return render(request,'Services.html')
def Contact(request):
    return render(request,'Contact.html')
def Serviceprovider(request):
    return render(request,'Serviceprovider.html')
    