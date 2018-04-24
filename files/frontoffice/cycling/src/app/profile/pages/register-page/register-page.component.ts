import { Component, OnInit, Input } from '@angular/core';
import { User } from '../../../core/models/user';
import { UserService } from '../../../core/services/user.service';

@Component({
  selector: 'app-register-page',
  templateUrl: './register-page.component.html',
  styleUrls: ['./register-page.component.scss']
})
export class RegisterPageComponent implements OnInit {
  constructor(private userService: UserService) {}

  public users: Array<User>;
  public user: User;

  ngOnInit() {
    this.getUsers();
    this.getSpecificUser();
  }

  getUsers() {
    this.userService
    .getUsers()
    .subscribe(user => this.users = user);
  }

  getSpecificUser() {
   this.userService
   .getProjectsById(1)
   .subscribe(newuser =>
      this.user = newuser);
  }

  // Call our api through the service

  addUser() {
    this.userService
    .addUser(this.user)
    .subscribe(user => {
      this.user.first_name = user.first_name;
      this.user.email = user.email;
      this.user.password = user.password;
    });
  }
  /*
  add(): void {
    this.userService.addUser(this.user)
      .subscribe(user => {
        this.users.push(user);
      });
  }
  */
}
