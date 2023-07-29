import { Component } from '@angular/core';
import {User} from '../Interfaces/UserInterface'
import {ServiceService} from '../app/Services/service.service';
import { Observable } from 'rxjs';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  users!:User[]
  constructor(private userService: ServiceService) {
   userService.getAllUsers().subscribe((user) =>  {
    this.users =user
  })
  }

}
