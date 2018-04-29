import { Component, OnInit, Input } from '@angular/core';
import { User } from '../../../core/models/user';
import { UserService } from '../../../core/services/user.service';

@Component({
  selector: 'app-register-page',
  templateUrl: './register-page.component.html',
  styleUrls: ['./register-page.component.scss']
})
export class RegisterPageComponent implements OnInit {

  public users: Array<User>;
  // Lege user for input
  user: User = {
    id: '',
    user_name: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    // address: '',
  };
  public newuser: ''; // Voor input;

  constructor(private userService: UserService) {}


  ngOnInit() {
    this.getUsers();
    this.getSpecificUser();
  }

  getUsers() {
    this.userService.getUsers()
    .subscribe(user => this.users = user);
  }

  getSpecificUser() {
   this.userService.getUsersById(1)
   .subscribe(newuser =>
      this.user = newuser);
  }

  // Call our api through the service

  addUser() {
    this.userService.addUser(this.user)
    .subscribe(res => {
      console.log(res);
    });
  }
}
