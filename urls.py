from django.urls import path, include
from users import  views

urlpatterns = [
    path('',views.index, name='home'),
    path('About/',views.About, name='about'),
    path('Services/',views.Services, name='services'),
    path('Contact/',views.Contact, name='contact'),
    path('Serviceprovider/',views.Serviceprovider, name='serviceprovider'),
]
    

  