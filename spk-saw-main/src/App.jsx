/** @format */

import { useMemo, useState } from "react";
import { BsFillMenuButtonWideFill, BsXLg } from "react-icons/bs";
import Menu from "./components/nav/Menu";
import { ShowModalContext } from "./context/ShowModalContext";
import MyRoutes from "./routes/MyRoutes";

function App() {
  const [showModal, setShowModal] = useState(false);
  const showModalContext = useMemo(
    () => ({ showModal, setShowModal }),
    [showModal]
  );
  const [showMenu, setShowMenu] = useState(false);
  return (
    <ShowModalContext.Provider value={showModalContext}>
      <div className="container mx-auto min-h-screen">
        <div className="flex gap-2">
          <div
            className={`${
              showMenu ? "left-56" : "left-4"
            } absolute top-2 cursor-pointer md:hidden`}
            onClick={() => setShowMenu(!showMenu)}
          >
            {!showMenu && <BsFillMenuButtonWideFill />}
            {showMenu && (
              <div className="bg-base-300 p-2 rounded-r-lg">
                <BsXLg />
              </div>
            )}
          </div>
          <div
            className={`${
              showMenu ? "absolute" : "hidden"
            } z-50 bg-base-100 border-r border-gray-700 min-h-screen md:static md:block`}
          >
            <Menu />
          </div>
          <div className="max-h-screen overflow-auto p-2 w-full">
            <MyRoutes />
          </div>
        </div>
      </div>
    </ShowModalContext.Provider>
  );
}

export default App;
