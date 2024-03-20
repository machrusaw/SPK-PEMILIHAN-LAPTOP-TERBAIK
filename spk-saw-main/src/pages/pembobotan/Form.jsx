/** @format */

import { useForm } from "react-hook-form";
import Modal from "../../components/modal/Modal";
import useKriteria from "../../store/kriteria";
import { v1 as uuidv1 } from "uuid";
import { useEffect } from "react";
import usePembobotan from "../../store/pembobotan";

const Form = ({
  showModal,
  setShowModal,
  dtEdit,
  changeData,
  setChangeData,
}) => {
  // @ts-ignore
  // store
  const { addData, updateData } = usePembobotan();
  const { setKriteria, dtKriteria } = useKriteria();
  // react hook form
  const {
    register,
    handleSubmit,
    watch,
    setValue,
    formState: { errors },
  } = useForm();
  // reset form
  const resetForm = () => {
    setValue("id", uuidv1());
    setValue("kriteria_id", "");
    setValue("bobot", "");
  };
  // effect
  useEffect(() => {
    if (dtEdit) {
      setValue("id", dtEdit?.id);
      setValue("kriteria_id", dtEdit?.kriteria_id);
      setValue("bobot", dtEdit?.bobot);
      return;
    }
    setKriteria({});
    resetForm();

    return () => {};
  }, [showModal, dtEdit]);

  // simpan data
  const onSubmit = async (data) => {
    if (dtEdit) {
      await updateData(data.id, data);
      setShowModal(false);
      return;
    }
    await addData(data);
    resetForm();
    setChangeData(changeData++);
    // jika ada perubahan data
  };

  return (
    <Modal>
      {/* form */}
      <form onSubmit={handleSubmit(onSubmit)} className="flex flex-col gap-4">
        <div className="grid md:grid-cols-2 md:gap-2">
          <input
            type="hidden"
            id="id"
            className="input input-bordered"
            {...register("id", { required: true })}
          />
          <div className="form-control">
            <label className="label" htmlFor="kriteria_id">
              <span className="label-text">Kriteria</span>
            </label>
            <select
              id="kriteria_id"
              className="select select-bordered w-full"
              defaultValue=""
              {...register("kriteria_id", { required: true })}
            >
              <option value="">Pilih Kriteria</option>
              {dtKriteria &&
                dtKriteria.map((row, index) => (
                  <option key={index} value={row.id}>
                    {row.nama}
                  </option>
                ))}
            </select>
            {errors.kriteria_id && (
              <span className="text-error text-sm">Tidak boleh kosong</span>
            )}
          </div>
          <div className="form-control">
            <label className="label" htmlFor="bobot">
              <span className="label-text">Bobot</span>
            </label>
            <input
              type="text"
              id="bobot"
              placeholder="Masukan bobot"
              className="input input-bordered"
              {...register("bobot", { required: true })}
            />
            {errors.bobot && (
              <span className="text-error text-sm">Tidak boleh kosong</span>
            )}
          </div>
        </div>
        <div className="">
          <button className="btn btn-secondary" type="submit">
            Simpan data
          </button>
        </div>
      </form>
    </Modal>
  );
};

export default Form;
