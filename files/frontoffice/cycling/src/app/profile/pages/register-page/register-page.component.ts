import { Component, OnInit } from '@angular/core';
import { User } from '../../../core/models/user';
import { UserService } from '../../../core/services/user.service';



@Component({
  selector: 'app-register-page',
  templateUrl: './register-page.component.html',
  styleUrls: ['./register-page.component.scss']
})
export class RegisterPageComponent implements OnInit {
  constructor(private userService: UserService) {}

  model = new User();

  ngOnInit() {}


  // Call our api through the service
  addProfile() {
    this.userService
    .addProfile(this.model)
    .subscribe(user => {
      console.log(user);
    });
  }
}
